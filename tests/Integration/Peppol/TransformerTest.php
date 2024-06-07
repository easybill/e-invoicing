<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration\Peppol;

use easybill\eInvoicing\DocumentFactory;
use easybill\eInvoicing\Specs\Peppol\Models\AccountingParty;
use easybill\eInvoicing\Specs\Peppol\Models\Address;
use easybill\eInvoicing\Specs\Peppol\Models\AllowanceCharge;
use easybill\eInvoicing\Specs\Peppol\Models\Amount;
use easybill\eInvoicing\Specs\Peppol\Models\CommodityClassification;
use easybill\eInvoicing\Specs\Peppol\Models\Contact;
use easybill\eInvoicing\Specs\Peppol\Models\Country;
use easybill\eInvoicing\Specs\Peppol\Models\Delivery;
use easybill\eInvoicing\Specs\Peppol\Models\DeliveryLocation;
use easybill\eInvoicing\Specs\Peppol\Models\FinancialInstitutionBranch;
use easybill\eInvoicing\Specs\Peppol\Models\Id;
use easybill\eInvoicing\Specs\Peppol\Models\Identification;
use easybill\eInvoicing\Specs\Peppol\Models\InvoiceLine;
use easybill\eInvoicing\Specs\Peppol\Models\Item;
use easybill\eInvoicing\Specs\Peppol\Models\ItemClassificationCode;
use easybill\eInvoicing\Specs\Peppol\Models\LegalMonetaryTotal;
use easybill\eInvoicing\Specs\Peppol\Models\OrderLineReference;
use easybill\eInvoicing\Specs\Peppol\Models\Party;
use easybill\eInvoicing\Specs\Peppol\Models\PartyLegalEntity;
use easybill\eInvoicing\Specs\Peppol\Models\PartyName;
use easybill\eInvoicing\Specs\Peppol\Models\PartyTaxScheme;
use easybill\eInvoicing\Specs\Peppol\Models\PayeeFinancialAccount;
use easybill\eInvoicing\Specs\Peppol\Models\PaymentMeans;
use easybill\eInvoicing\Specs\Peppol\Models\PaymentMeansCode;
use easybill\eInvoicing\Specs\Peppol\Models\PaymentTerms;
use easybill\eInvoicing\Specs\Peppol\Models\Price;
use easybill\eInvoicing\Specs\Peppol\Models\Quantity;
use easybill\eInvoicing\Specs\Peppol\Models\StandardItemIdentification;
use easybill\eInvoicing\Specs\Peppol\Models\TaxCategory;
use easybill\eInvoicing\Specs\Peppol\Models\TaxScheme;
use easybill\eInvoicing\Specs\Peppol\Models\TaxSubtotal;
use easybill\eInvoicing\Specs\Peppol\Models\TaxTotal;
use easybill\eInvoicing\Specs\Peppol\Transformer;
use easybill\eInvoicingTests\Validators\PeppolValidator;

test(
    'Allows building a valid Peppol BIS 3.0 Billing document with a simple structure',
    function (string $pathToXmlExample) {
        $exampleXml = file_get_contents($pathToXmlExample);
        $exampleXml = $this->removeXmlMutates($exampleXml);
        $exampleXml = $this->reformatXml($exampleXml);

        $invoice = DocumentFactory::createPeppolInvoice();
        $invoice->id = 'Snippet1';
        $invoice->issueDate = '2017-11-13';
        $invoice->dueDate = '2017-12-01';
        $invoice->invoiceTypeCode = 380;
        $invoice->documentCurrencyCode = 'EUR';
        $invoice->buyerReference = '0150abc';
        $invoice->accountingCost = '4025:123:4343';

        // Supplier
        $supplierParty = new Party();
        $supplierParty->endpointId = new Id();
        $supplierParty->endpointId->schemeID = '0088';
        $supplierParty->endpointId->value = '9482348239847239874';
        $supplierParty->partyIdentification = new Identification();
        $supplierParty->partyIdentification->id = new Id();
        $supplierParty->partyIdentification->id->value = '99887766';
        $supplierParty->partyName = new PartyName();
        $supplierParty->partyName->name = 'SupplierTradingName Ltd.';
        $supplierParty->postalAddress = new Address();
        $supplierParty->postalAddress->streetName = 'Main street 1';
        $supplierParty->postalAddress->additionalStreetName = 'Postbox 123';
        $supplierParty->postalAddress->cityName = 'London';
        $supplierParty->postalAddress->postalZone = 'GB 123 EW';
        $supplierParty->postalAddress->country = new Country();
        $supplierParty->postalAddress->country->identificationCode = 'GB';

        $partyTaxScheme = new PartyTaxScheme();
        $partyTaxScheme->companyId = 'GB1232434';
        $partyTaxScheme->taxScheme = new TaxScheme();
        $partyTaxScheme->taxScheme->id = 'VAT';
        $supplierParty->partyTaxScheme[] = $partyTaxScheme;

        $supplierParty->partyLegalEntity = new PartyLegalEntity();
        $supplierParty->partyLegalEntity->id = new Id();
        $supplierParty->partyLegalEntity->id->value = 'GB983294';
        $supplierParty->partyLegalEntity->registrationName = 'SupplierOfficialName Ltd';

        $invoice->accountingSupplierParty = $accountingSupplierParty = new AccountingParty();
        $accountingSupplierParty->party = $supplierParty;

        // Customer
        $customerParty = new Party();
        $customerParty->endpointId = new Id();
        $customerParty->endpointId->schemeID = '0002';
        $customerParty->endpointId->value = 'FR23342';
        $customerParty->partyIdentification = new Identification();
        $customerParty->partyIdentification->id = new Id();
        $customerParty->partyIdentification->id->schemeID = '0002';
        $customerParty->partyIdentification->id->value = 'FR23342';
        $customerParty->partyName = new PartyName();
        $customerParty->partyName->name = 'BuyerTradingName AS';
        $customerParty->postalAddress = new Address();
        $customerParty->postalAddress->streetName = 'Hovedgatan 32';
        $customerParty->postalAddress->additionalStreetName = 'Po box 878';
        $customerParty->postalAddress->cityName = 'Stockholm';
        $customerParty->postalAddress->postalZone = '456 34';
        $customerParty->postalAddress->country = new Country();
        $customerParty->postalAddress->country->identificationCode = 'SE';
        $customerParty->partyTaxScheme[] = $partyTaxScheme = new PartyTaxScheme();
        $partyTaxScheme->companyId = 'SE4598375937';
        $partyTaxScheme->taxScheme = new TaxScheme();
        $partyTaxScheme->taxScheme->id = 'VAT';
        $customerParty->partyLegalEntity = new PartyLegalEntity();
        $customerParty->partyLegalEntity->registrationName = 'Buyer Official Name';
        $customerParty->partyLegalEntity->id = new Id();
        $customerParty->partyLegalEntity->id->schemeID = '0183';
        $customerParty->partyLegalEntity->id->value = '39937423947';
        $customerParty->contact = new Contact();
        $customerParty->contact->name = 'Lisa Johnson';
        $customerParty->contact->telephone = '23434234';
        $customerParty->contact->electronicMail = 'lj@buyer.se';

        $invoice->accountingCustomerParty = $accountingCustomerParty = new AccountingParty();
        $accountingCustomerParty->party = $customerParty;

        $invoice->delivery = new Delivery();
        $invoice->delivery->actualDeliveryDate = '2017-11-01';
        $invoice->delivery->deliveryLocation = new DeliveryLocation();
        $invoice->delivery->deliveryLocation->id = new Id();
        $invoice->delivery->deliveryLocation->id->schemeID = '0088';
        $invoice->delivery->deliveryLocation->id->value = '9483759475923478';
        $invoice->delivery->deliveryLocation->address = new Address();
        $invoice->delivery->deliveryLocation->address->streetName = 'Delivery street 2';
        $invoice->delivery->deliveryLocation->address->additionalStreetName = 'Building 56';
        $invoice->delivery->deliveryLocation->address->cityName = 'Stockholm';
        $invoice->delivery->deliveryLocation->address->postalZone = '21234';
        $invoice->delivery->deliveryLocation->address->country = new Country();
        $invoice->delivery->deliveryLocation->address->country->identificationCode = 'SE';
        $invoice->delivery->deliveryParty = new Party();
        $invoice->delivery->deliveryParty->partyName = new PartyName();
        $invoice->delivery->deliveryParty->partyName->name = 'Delivery party Name';

        // PaymentMeans
        $paymentMeans = new PaymentMeans();
        $paymentMeans->paymentMeansCode = new PaymentMeansCode();
        $paymentMeans->paymentMeansCode->name = 'Credit transfer';
        $paymentMeans->paymentMeansCode->value = '30';
        $paymentMeans->paymentId = new Id();
        $paymentMeans->paymentId->value = 'Snippet1';
        $paymentMeans->payeeFinancialAccount = new PayeeFinancialAccount();
        $paymentMeans->payeeFinancialAccount->id = new Id();
        $paymentMeans->payeeFinancialAccount->id->value = 'IBAN32423940';
        $paymentMeans->payeeFinancialAccount->name = 'AccountName';
        $paymentMeans->payeeFinancialAccount->financialInstitutionBranch = new FinancialInstitutionBranch();
        $paymentMeans->payeeFinancialAccount->financialInstitutionBranch->id = new Id();
        $paymentMeans->payeeFinancialAccount->financialInstitutionBranch->id->value = 'BIC324098';

        $invoice->paymentMeans[] = $paymentMeans;

        // PaymentTerms
        $invoice->paymentTerms = new PaymentTerms();
        $invoice->paymentTerms->note = 'Payment within 10 days, 2% discount';

        $invoice->allowanceCharge[] = $allowanceCharge = new AllowanceCharge();
        $allowanceCharge->chargeIndicator = 'true';
        $allowanceCharge->allowanceChargeReason = 'Insurance';
        $allowanceCharge->amount = new Amount();
        $allowanceCharge->amount->currencyID = 'EUR';
        $allowanceCharge->amount->value = '25';
        $allowanceCharge->taxCategory = new TaxCategory();
        $allowanceCharge->taxCategory->id = new Id();
        $allowanceCharge->taxCategory->id->value = 'S';
        $allowanceCharge->taxCategory->percent = '25.0';
        $allowanceCharge->taxCategory->taxScheme = new TaxScheme();
        $allowanceCharge->taxCategory->taxScheme->id = 'VAT';

        // Tax Total
        $taxTotal = new TaxTotal();
        $taxTotal->taxAmount = new Amount();
        $taxTotal->taxAmount->currencyID = 'EUR';
        $taxTotal->taxAmount->value = '331.25';

        $taxSubtotal = new TaxSubtotal();
        $taxSubtotal->taxableAmount = new Amount();
        $taxSubtotal->taxableAmount->currencyID = 'EUR';
        $taxSubtotal->taxableAmount->value = '1325';
        $taxSubtotal->taxAmount = new Amount();
        $taxSubtotal->taxAmount->currencyID = 'EUR';
        $taxSubtotal->taxAmount->value = '331.25';
        $taxSubtotal->taxCategory = new TaxCategory();
        $taxSubtotal->taxCategory->id = new Id();
        $taxSubtotal->taxCategory->id->value = 'S';
        $taxSubtotal->taxCategory->percent = '25.0';
        $taxSubtotal->taxCategory->taxScheme = new TaxScheme();
        $taxSubtotal->taxCategory->taxScheme->id = 'VAT';

        $taxTotal->taxSubtotal[] = $taxSubtotal;
        $invoice->taxTotal[] = $taxTotal;

        // LegalMonetaryTotal
        $invoice->legalMonetaryTotal = new LegalMonetaryTotal();
        $invoice->legalMonetaryTotal->lineExtensionAmount = new Amount();
        $invoice->legalMonetaryTotal->lineExtensionAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->lineExtensionAmount->value = '1300';
        $invoice->legalMonetaryTotal->taxExclusiveAmount = new Amount();
        $invoice->legalMonetaryTotal->taxExclusiveAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->taxExclusiveAmount->value = '1325';
        $invoice->legalMonetaryTotal->taxInclusiveAmount = new Amount();
        $invoice->legalMonetaryTotal->taxInclusiveAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->taxInclusiveAmount->value = '1656.25';
        $invoice->legalMonetaryTotal->chargeTotalAmount = new Amount();
        $invoice->legalMonetaryTotal->chargeTotalAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->chargeTotalAmount->value = '25';
        $invoice->legalMonetaryTotal->payableAmount = new Amount();
        $invoice->legalMonetaryTotal->payableAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->payableAmount->value = '1656.25';

        // Invoice Lines
        $invoice->invoiceLine = [];

        // Invoice Line 1
        $invoice->invoiceLine[] = $invoiceLine1 = new InvoiceLine();
        $invoiceLine1->id = new Id();
        $invoiceLine1->id->value = '1';
        $invoiceLine1->invoicedQuantity = new Quantity();
        $invoiceLine1->invoicedQuantity->unitCode = 'DAY';
        $invoiceLine1->invoicedQuantity->value = '7';
        $invoiceLine1->accountingCost = 'Konteringsstreng';
        $invoiceLine1->lineExtensionAmount = new Amount();
        $invoiceLine1->lineExtensionAmount->currencyID = 'EUR';
        $invoiceLine1->lineExtensionAmount->value = '2800';
        $invoiceLine1->orderLineReference = new OrderLineReference();
        $invoiceLine1->orderLineReference->lineId = new Id();
        $invoiceLine1->orderLineReference->lineId->value = '123';

        // Item 1
        $invoiceLine1->item[] = $item1 = new Item();
        $item1->description = 'Description of item';
        $item1->name = 'item name';
        $item1->standardItemIdentification = new StandardItemIdentification();
        $item1->standardItemIdentification->id = new Id();
        $item1->standardItemIdentification->id->schemeID = '0088';
        $item1->standardItemIdentification->id->value = '21382183120983';
        $item1->originCountry = new Country();
        $item1->originCountry->identificationCode = 'NO';
        $item1->commodityClassification = new CommodityClassification();
        $item1->commodityClassification->itemClassificationCode = new ItemClassificationCode();
        $item1->commodityClassification->itemClassificationCode->listId = 'SRV';
        $item1->commodityClassification->itemClassificationCode->value = '09348023';
        $item1->classifiedTaxCategory = new TaxCategory();
        $item1->classifiedTaxCategory->id = new Id();
        $item1->classifiedTaxCategory->id->value = 'S';
        $item1->classifiedTaxCategory->percent = '25.0';
        $item1->classifiedTaxCategory->taxScheme = new TaxScheme();
        $item1->classifiedTaxCategory->taxScheme->id = 'VAT';

        $invoiceLine1->price = new Price();
        $invoiceLine1->price->priceAmount = new Amount();
        $invoiceLine1->price->priceAmount->currencyID = 'EUR';
        $invoiceLine1->price->priceAmount->value = '400';

        // Invoice Line 2
        $invoice->invoiceLine[] = $invoiceLine2 = new InvoiceLine();
        $invoiceLine2->id = new Id();
        $invoiceLine2->id->value = '2';
        $invoiceLine2->invoicedQuantity = new Quantity();
        $invoiceLine2->invoicedQuantity->unitCode = 'DAY';
        $invoiceLine2->invoicedQuantity->value = '-3';
        $invoiceLine2->lineExtensionAmount = new Amount();
        $invoiceLine2->lineExtensionAmount->currencyID = 'EUR';
        $invoiceLine2->lineExtensionAmount->value = '-1500';

        $invoiceLine2->orderLineReference = new OrderLineReference();
        $invoiceLine2->orderLineReference->lineId = new Id();
        $invoiceLine2->orderLineReference->lineId->value = '123';

        // Item 2
        $invoiceLine2->item[] = $item2 = new Item();
        $item2->name = 'item name 2';
        $item2->description = 'Description 2';
        $item2->standardItemIdentification = new StandardItemIdentification();
        $item2->standardItemIdentification->id = new Id();
        $item2->standardItemIdentification->id->schemeID = '0088';
        $item2->standardItemIdentification->id->value = '21382183120983';
        $item2->originCountry = new Country();
        $item2->originCountry->identificationCode = 'NO';
        $item2->commodityClassification = new CommodityClassification();
        $item2->commodityClassification->itemClassificationCode = new ItemClassificationCode();
        $item2->commodityClassification->itemClassificationCode->listId = 'SRV';
        $item2->commodityClassification->itemClassificationCode->value = '09348023';
        $item2->classifiedTaxCategory = new TaxCategory();
        $item2->classifiedTaxCategory->id = new Id();
        $item2->classifiedTaxCategory->id->value = 'S';
        $item2->classifiedTaxCategory->percent = '25.0';
        $item2->classifiedTaxCategory->taxScheme = new TaxScheme();
        $item2->classifiedTaxCategory->taxScheme->id = 'VAT';
        $invoiceLine2->price = new Price();
        $invoiceLine2->price->priceAmount = new Amount();
        $invoiceLine2->price->priceAmount->currencyID = 'EUR';
        $invoiceLine2->price->priceAmount->value = '500';

        $xml = Transformer::create()->transformPeppolDocumentToXml($invoice);
        $xml = $this->reformatXml($xml);

        $this->assertSame($exampleXml, $xml);

        $this->validateWithPeppolValidator($xml);
    },
)->with([
    __DIR__ . '/Examples/base-example.xml',
]);

test(
    'Building and validation a broken example for peppol',
    function () {
        $invoice = DocumentFactory::createPeppolInvoice();
        $invoice->profileId = 'DifferentProfile';

        $xml = Transformer::create()->transformPeppolDocumentToXml($invoice);
        $xml = $this->reformatXml($xml);

        $validator = new PeppolValidator();

        $errors = $validator->validate($xml);

        expect($errors)->toContain('Business process MUST be in the format');
    },
);
