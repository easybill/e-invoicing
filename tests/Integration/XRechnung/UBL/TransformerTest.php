<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration\XRechnung3\UBL;

use easybill\eInvoicing\DocumentFactory;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\AccountingParty;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Address;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Amount;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\CommodityClassification;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Contact;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Country;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Id;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Identification;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\InvoiceLine;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Item;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\ItemClassificationCode;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\LegalMonetaryTotal;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Note;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\OrderLineReference;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Party;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PartyLegalEntity;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PartyName;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PartyTaxScheme;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PayeeFinancialAccount;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PaymentMeans;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PaymentMeansCode;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PaymentTerms;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Period;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Price;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Quantity;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\SellersItemIdentification;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\TaxCategory;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\TaxScheme;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\TaxSubtotal;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\TaxTotal;
use easybill\eInvoicing\Specs\XRechnung\UBL\Transformer;

test(
    'Allows building a valid XRechnung 3.0 document with a simple structure',
    function (string $pathToXmlExample) {
        $exampleXml = file_get_contents($pathToXmlExample);
        $exampleXml = $this->removeXmlMutates($exampleXml);
        $exampleXml = $this->reformatXml($exampleXml);

        $this->validateWithKositValidator($exampleXml);

        $invoice = DocumentFactory::createXRechnungUBLInvoice();
        $invoice->id = '123456XX';
        $invoice->issueDate = '2016-04-04';
        $invoice->invoiceTypeCode = 380;
        $invoice->documentCurrencyCode = 'EUR';
        $invoice->buyerReference = '04011000-12345-03';

        // Notes
        $invoice->note[] = $note = new Note();
        $note->value = '#ADU#Es gelten unsere Allgem. Geschäftsbedingungen, die Sie unter […] finden.';

        // Supplier
        $supplierParty = new Party();
        $supplierParty->endpointId = new Id();
        $supplierParty->endpointId->schemeID = 'EM';
        $supplierParty->endpointId->value = 'seller@email.de';
        $supplierParty->partyName = new PartyName();
        $supplierParty->partyName->name = '[Seller trading name]';
        $supplierParty->postalAddress = new Address();
        $supplierParty->postalAddress->streetName = '[Seller address line 1]';
        $supplierParty->postalAddress->cityName = '[Seller city]';
        $supplierParty->postalAddress->postalZone = '12345';
        $supplierParty->postalAddress->country = new Country();
        $supplierParty->postalAddress->country->identificationCode = 'DE';

        $partyTaxScheme = new PartyTaxScheme();
        $partyTaxScheme->companyId = 'DE 123456789';
        $partyTaxScheme->taxScheme = new TaxScheme();
        $partyTaxScheme->taxScheme->id = 'VAT';
        $supplierParty->partyTaxScheme[] = $partyTaxScheme;

        $supplierParty->partyLegalEntity = new PartyLegalEntity();
        $supplierParty->partyLegalEntity->id = new Id();
        $supplierParty->partyLegalEntity->id->value = '[HRA-Eintrag]';
        $supplierParty->partyLegalEntity->companyLegalForm = '123/456/7890, HRA-Eintrag in […]';
        $supplierParty->partyLegalEntity->registrationName = '[Seller name]';
        $supplierParty->contact = new Contact();
        $supplierParty->contact->name = 'nicht vorhanden';
        $supplierParty->contact->telephone = '+49 1234-5678';
        $supplierParty->contact->electronicMail = 'seller@email.de';

        $invoice->accountingSupplierParty = $accountingSupplierParty = new AccountingParty();
        $accountingSupplierParty->party = $supplierParty;

        // Customer
        $customerParty = new Party();
        $customerParty->endpointId = new Id();
        $customerParty->endpointId->schemeID = 'EM';
        $customerParty->endpointId->value = 'buyer@info.de';
        $customerParty->partyIdentification = new Identification();
        $customerParty->partyIdentification->id = new Id();
        $customerParty->partyIdentification->id->value = '[Buyer identifier]';
        $customerParty->postalAddress = new Address();
        $customerParty->postalAddress->streetName = '[Buyer address line 1]';
        $customerParty->postalAddress->cityName = '[Buyer city]';
        $customerParty->postalAddress->postalZone = '12345';
        $customerParty->postalAddress->country = new Country();
        $customerParty->postalAddress->country->identificationCode = 'DE';
        $customerParty->partyLegalEntity = new PartyLegalEntity();
        $customerParty->partyLegalEntity->registrationName = '[Buyer name]';

        $invoice->accountingCustomerParty = $accountingCustomerParty = new AccountingParty();
        $accountingCustomerParty->party = $customerParty;

        // PaymentMeans
        $paymentMeans = new PaymentMeans();
        $paymentMeans->paymentMeansCode = new PaymentMeansCode();
        $paymentMeans->paymentMeansCode->value = '58';
        $paymentMeans->payeeFinancialAccount = new PayeeFinancialAccount();
        $paymentMeans->payeeFinancialAccount->id = new Id();
        $paymentMeans->payeeFinancialAccount->id->value = 'DE75512108001245126199';
        $invoice->paymentMeans[] = $paymentMeans;

        // PaymentTerms
        $invoice->paymentTerms = new PaymentTerms();
        $invoice->paymentTerms->note = 'Zahlbar sofort ohne Abzug.';

        // Tax Total
        $taxTotal = new TaxTotal();
        $taxTotal->taxAmount = new Amount();
        $taxTotal->taxAmount->currencyID = 'EUR';
        $taxTotal->taxAmount->value = '22.04';

        $taxSubtotal = new TaxSubtotal();
        $taxSubtotal->taxableAmount = new Amount();
        $taxSubtotal->taxableAmount->currencyID = 'EUR';
        $taxSubtotal->taxableAmount->value = '314.86';
        $taxSubtotal->taxAmount = new Amount();
        $taxSubtotal->taxAmount->currencyID = 'EUR';
        $taxSubtotal->taxAmount->value = '22.04';
        $taxSubtotal->taxCategory = new TaxCategory();
        $taxSubtotal->taxCategory->id = new Id();
        $taxSubtotal->taxCategory->id->value = 'S';
        $taxSubtotal->taxCategory->percent = 7;
        $taxSubtotal->taxCategory->taxScheme = new TaxScheme();
        $taxSubtotal->taxCategory->taxScheme->id = 'VAT';

        $taxTotal->taxSubtotal[] = $taxSubtotal;
        $invoice->taxTotal[] = $taxTotal;

        // LegalMonetaryTotal
        $invoice->legalMonetaryTotal = new LegalMonetaryTotal();
        $invoice->legalMonetaryTotal->lineExtensionAmount = new Amount();
        $invoice->legalMonetaryTotal->lineExtensionAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->lineExtensionAmount->value = '314.86';
        $invoice->legalMonetaryTotal->taxExclusiveAmount = new Amount();
        $invoice->legalMonetaryTotal->taxExclusiveAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->taxExclusiveAmount->value = '314.86';
        $invoice->legalMonetaryTotal->taxInclusiveAmount = new Amount();
        $invoice->legalMonetaryTotal->taxInclusiveAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->taxInclusiveAmount->value = '336.9';
        $invoice->legalMonetaryTotal->payableAmount = new Amount();
        $invoice->legalMonetaryTotal->payableAmount->currencyID = 'EUR';
        $invoice->legalMonetaryTotal->payableAmount->value = '336.9';

        // Invoice Lines
        $invoice->invoiceLine = [];

        // Invoice Line 1
        $invoice->invoiceLine[] = $invoiceLine1 = new InvoiceLine();
        $invoiceLine1->id = new Id();
        $invoiceLine1->id->value = 'Zeitschrift [...]';
        $invoiceLine1->note = 'Die letzte Lieferung im Rahmen des abgerechneten Abonnements erfolgt in 12/2016 Lieferung erfolgt / erfolgte direkt vom Verlag';
        $invoiceLine1->invoicedQuantity = new Quantity();
        $invoiceLine1->invoicedQuantity->unitCode = 'XPP';
        $invoiceLine1->invoicedQuantity->value = '1';
        $invoiceLine1->lineExtensionAmount = new Amount();
        $invoiceLine1->lineExtensionAmount->currencyID = 'EUR';
        $invoiceLine1->lineExtensionAmount->value = '288.79';
        $invoiceLine1->invoicePeriod = new Period();
        $invoiceLine1->invoicePeriod->startDate = '2016-01-01';
        $invoiceLine1->invoicePeriod->endDate = '2016-12-31';
        $invoiceLine1->orderLineReference = new OrderLineReference();
        $invoiceLine1->orderLineReference->lineId = new Id();
        $invoiceLine1->orderLineReference->lineId->value = '6171175.1';

        // Item 1
        $invoiceLine1->item[] = $item1 = new Item();
        $item1->description = 'Zeitschrift Inland';
        $item1->name = 'Zeitschrift [...]';
        $item1->sellersItemIdentification = new SellersItemIdentification();
        $item1->sellersItemIdentification->id = new Id();
        $item1->sellersItemIdentification->id->value = '246';
        $item1->commodityClassification = new CommodityClassification();
        $item1->commodityClassification->itemClassificationCode = new ItemClassificationCode();
        $item1->commodityClassification->itemClassificationCode->listId = 'IB';
        $item1->commodityClassification->itemClassificationCode->value = '0721-880X';
        $item1->classifiedTaxCategory = new TaxCategory();
        $item1->classifiedTaxCategory->id = new Id();
        $item1->classifiedTaxCategory->id->value = 'S';
        $item1->classifiedTaxCategory->percent = 7;
        $item1->classifiedTaxCategory->taxScheme = new TaxScheme();
        $item1->classifiedTaxCategory->taxScheme->id = 'VAT';

        $invoiceLine1->price = new Price();
        $invoiceLine1->price->priceAmount = new Amount();
        $invoiceLine1->price->priceAmount->currencyID = 'EUR';
        $invoiceLine1->price->priceAmount->value = '288.79';

        // Invoice Line 2
        $invoice->invoiceLine[] = $invoiceLine2 = new InvoiceLine();
        $invoiceLine2->id = new Id();
        $invoiceLine2->id->value = 'Porto + Versandkosten';
        $invoiceLine2->invoicedQuantity = new Quantity();
        $invoiceLine2->invoicedQuantity->unitCode = 'XPP';
        $invoiceLine2->invoicedQuantity->value = '1';
        $invoiceLine2->lineExtensionAmount = new Amount();
        $invoiceLine2->lineExtensionAmount->currencyID = 'EUR';
        $invoiceLine2->lineExtensionAmount->value = '26.07';

        // Item 2
        $invoiceLine2->item[] = $item2 = new Item();
        $item2->name = 'Porto + Versandkosten';
        $item2->classifiedTaxCategory = new TaxCategory();
        $item2->classifiedTaxCategory->id = new Id();
        $item2->classifiedTaxCategory->id->value = 'S';
        $item2->classifiedTaxCategory->percent = 7;
        $item2->classifiedTaxCategory->taxScheme = new TaxScheme();
        $item2->classifiedTaxCategory->taxScheme->id = 'VAT';
        $invoiceLine2->price = new Price();
        $invoiceLine2->price->priceAmount = new Amount();
        $invoiceLine2->price->priceAmount->currencyID = 'EUR';
        $invoiceLine2->price->priceAmount->value = '26.07';

        $xml = Transformer::create()->transformUblDocumentToXml($invoice);
        $xml = $this->reformatXml($xml);

        $this->assertSame($exampleXml, $xml);
        $this->validateWithKositValidator($xml);
    }
)->with([
    __DIR__ . '/Examples/01.01a-INVOICE_ubl.xml',
]);
