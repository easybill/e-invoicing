<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration\ZUGFeRD;

use easybill\eInvoicing\DocumentFactory;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\Amount;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\BinaryObject;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\CreditorFinancialAccount;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\CreditorFinancialInstitution;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\DateTime;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\DocumentLineDocument;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\HeaderTradeAgreement;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\HeaderTradeDelivery;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\HeaderTradeSettlement;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\Id;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\LineTradeAgreement;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\LineTradeDelivery;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\LineTradeSettlement;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\Note;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\Period;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\Quantity;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\ReferencedDocument;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\SupplyChainEvent;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\SupplyChainTradeLineItem;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\SupplyChainTradeTransaction;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TaxRegistration;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeAddress;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeContact;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeParty;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradePaymentTerms;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradePrice;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeProduct;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeSettlementHeaderMonetarySummation;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeSettlementLineMonetarySummation;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeSettlementPaymentMeans;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeTax;
use easybill\eInvoicing\Specs\XRechnung\CII\Models\UniversalCommunication;
use easybill\eInvoicing\Specs\XRechnung\CII\Transformer;
use easybill\eInvoicingTests\Validators\SchemaValidator;

test(
    'building XRechnung CII document for XRECHNUNG_Einfach.xml',
    function () {
        $invoice = DocumentFactory::createXRechnungCIIInvoice();
        $invoice->exchangedDocument->id = '471102';
        $invoice->exchangedDocument->typeCode = '380';
        $invoice->exchangedDocument->issueDateTime = DateTime::create(102, '20180305');
        $invoice->exchangedDocument->notes[] = Note::create('Rechnung gemäß Bestellung vom 01.03.2018.');
        $invoice->exchangedDocument->notes[] = Note::create('Lieferant GmbH
            Lieferantenstraße 20
            80333 München
            Deutschland
            Geschäftsführer: Hans Muster
            Handelsregisternummer: H A 123
         ', 'REG');

        $invoice->supplyChainTradeTransaction = new SupplyChainTradeTransaction();
        $invoice->supplyChainTradeTransaction->lineItems[] = $item1 = new SupplyChainTradeLineItem();
        $item1->associatedDocumentLineDocument = DocumentLineDocument::create('1');

        $item1->specifiedTradeProduct = new TradeProduct();
        $item1->specifiedTradeProduct->name = 'Trennblätter A4';
        $item1->specifiedTradeProduct->sellerAssignedID = 'TB100A4';
        $item1->specifiedTradeProduct->globalID = Id::create('4012345001235', '0160');

        $item1->tradeAgreement = new LineTradeAgreement();
        $item1->tradeAgreement->netPrice = TradePrice::create('9.9000');
        $item1->tradeAgreement->grossPrice = TradePrice::create('9.9000');

        $item1->delivery = new LineTradeDelivery();
        $item1->delivery->billedQuantity = Quantity::create('20.0000', 'H87');

        $item1->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item1->specifiedLineTradeSettlement->tradeTax[] = $item1tax = new TradeTax();
        $item1tax->typeCode = 'VAT';
        $item1tax->categoryCode = 'S';
        $item1tax->rateApplicablePercent = '19.00';

        $item1->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('198.00');

        $invoice->supplyChainTradeTransaction->lineItems[] = $item2 = new SupplyChainTradeLineItem();
        $item2->associatedDocumentLineDocument = DocumentLineDocument::create('2');

        $item2->specifiedTradeProduct = new TradeProduct();
        $item2->specifiedTradeProduct->name = 'Joghurt Banane';
        $item2->specifiedTradeProduct->sellerAssignedID = 'ARNR2';
        $item2->specifiedTradeProduct->globalID = Id::create('4000050986428', '0160');

        $item2->tradeAgreement = new LineTradeAgreement();
        $item2->tradeAgreement->netPrice = TradePrice::create('5.5000');
        $item2->tradeAgreement->grossPrice = TradePrice::create('5.5000');

        $item2->delivery = new LineTradeDelivery();
        $item2->delivery->billedQuantity = Quantity::create('50.0000', 'H87');

        $item2->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item2->specifiedLineTradeSettlement->tradeTax[] = $item2tax = new TradeTax();
        $item2tax->typeCode = 'VAT';
        $item2tax->categoryCode = 'S';
        $item2tax->rateApplicablePercent = '7.00';

        $item2->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('275.00');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerReference = '04011000-12345-34';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->id = Id::create('1034567');
        $buyerTradeParty->name = 'Max Mustermann';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->globalID[] = Id::create('4000001123452', '0088');
        $sellerTradeParty->name = 'Lieferant GmbH';
        $sellerTradeParty->definedTradeContact = new TradeContact();
        $sellerTradeParty->definedTradeContact->personName = 'Max Mustermann';
        $sellerTradeParty->definedTradeContact->departmentName = 'Muster-Einkauf';
        $sellerTradeParty->definedTradeContact->telephoneUniversalCommunication = new UniversalCommunication();
        $sellerTradeParty->definedTradeContact->telephoneUniversalCommunication->completeNumber = '+49891234567';
        $sellerTradeParty->definedTradeContact->emailURIUniversalCommunication = new UniversalCommunication();
        $sellerTradeParty->definedTradeContact->emailURIUniversalCommunication->uriid = Id::create('Max@Mustermann.de');

        $sellerTradeParty->postalTradeAddress = new TradeAddress();
        $sellerTradeParty->postalTradeAddress->postcode = '80333';
        $sellerTradeParty->postalTradeAddress->lineOne = 'Lieferantenstraße 20';
        $sellerTradeParty->postalTradeAddress->city = 'München';
        $sellerTradeParty->postalTradeAddress->countryCode = 'DE';

        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('201/113/40209', 'FC');
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('DE123456789', 'VA');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->id = Id::create('GE2020211');
        $buyerTradeParty->name = 'Kunden AG Mitte';

        $buyerTradeParty->postalTradeAddress = new TradeAddress();
        $buyerTradeParty->postalTradeAddress->postcode = '69876';
        $buyerTradeParty->postalTradeAddress->lineOne = 'Kundenstraße 15';
        $buyerTradeParty->postalTradeAddress->city = 'Frankfurt';
        $buyerTradeParty->postalTradeAddress->countryCode = 'DE';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery = new HeaderTradeDelivery();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery->chainEvent = new SupplyChainEvent();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery->chainEvent->date = DateTime::create(102, '20180305');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementPaymentMeans[] = $paymentMeans1 = new TradeSettlementPaymentMeans();
        $paymentMeans1->typeCode = '58';
        $paymentMeans1->information = 'Zahlung per SEPA Überweisung.';
        $paymentMeans1->payeePartyCreditorFinancialAccount = new CreditorFinancialAccount();
        $paymentMeans1->payeePartyCreditorFinancialAccount->ibanId = Id::create('DE02120300000000202051');
        $paymentMeans1->payeePartyCreditorFinancialAccount->AccountName = 'Kunden AG';
        $paymentMeans1->payeeSpecifiedCreditorFinancialInstitution = new CreditorFinancialInstitution();
        $paymentMeans1->payeeSpecifiedCreditorFinancialInstitution->bicId = Id::create('BYLADEM1001');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->tradeTaxes[] = $headerTax1 = new TradeTax();
        $headerTax1->typeCode = 'VAT';
        $headerTax1->categoryCode = 'S';
        $headerTax1->basisAmount = Amount::create('275.00');
        $headerTax1->calculatedAmount = Amount::create('19.25');
        $headerTax1->rateApplicablePercent = '7.00';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->tradeTaxes[] = $headerTax2 = new TradeTax();
        $headerTax2->typeCode = 'VAT';
        $headerTax2->categoryCode = 'S';
        $headerTax2->basisAmount = Amount::create('198.00');
        $headerTax2->calculatedAmount = Amount::create('37.62');
        $headerTax2->rateApplicablePercent = '19.00';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradePaymentTerms[] = $paymentTerms = new TradePaymentTerms();
        $paymentTerms->description = 'Zahlbar innerhalb 30 Tagen netto bis 04.04.2018, 3% Skonto innerhalb 10 Tagen bis 15.03.2018';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementHeaderMonetarySummation = $summation = new TradeSettlementHeaderMonetarySummation();
        $summation->lineTotalAmount = Amount::create('473.00');
        $summation->chargeTotalAmount = Amount::create('0.00');
        $summation->allowanceTotalAmount = Amount::create('0.00');
        $summation->taxBasisTotalAmount[] = Amount::create('473.00');
        $summation->taxTotalAmount[] = Amount::create('56.87', 'EUR');
        $summation->grandTotalAmount[] = Amount::create('529.87');
        $summation->totalPrepaidAmount = Amount::create('0.00');
        $summation->duePayableAmount = Amount::create('529.87');

        $this->validateWithKositValidator(Transformer::create()->transform($invoice));

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/XRECHNUNG_Einfach.xml',
            SchemaValidator::SCHEMA_EN16931
        );
    }
);

test(
    'building XRechnung CII document for XRECHNUNG_Reisekostenabrechnung.xml',
    function () {
        $invoice = DocumentFactory::createXRechnungCIIInvoice();
        $invoice->exchangedDocument->id = '280081';
        $invoice->exchangedDocument->typeCode = '380';
        $invoice->exchangedDocument->issueDateTime = DateTime::create(102, '20180713');
        $invoice->exchangedDocument->notes[] = Note::create('Listelotte Müllermann, Kumpelstr. 54, 12345 Berlin
				Handelsregisternummer: H A 713
			', 'REG');
        $invoice->exchangedDocument->notes[] = Note::create('Flug wurde vom Auftraggeber gebucht.
			', 'AAI');
        $invoice->exchangedDocument->notes[] = Note::create('Reise: Musterreisekostenabrechnung
				Zweck: Workshop in Nürnberg
				Land: Deutschland
				Strecke: Berlin - Berlin
			', 'AAI');

        $invoice->supplyChainTradeTransaction = new SupplyChainTradeTransaction();
        $invoice->supplyChainTradeTransaction->lineItems[] = $item1 = new SupplyChainTradeLineItem();
        $item1->associatedDocumentLineDocument = DocumentLineDocument::create('1');

        $item1->specifiedTradeProduct = new TradeProduct();
        $item1->specifiedTradeProduct->name = 'Übernachtung. 2 Nächte Hotel';

        $item1->tradeAgreement = new LineTradeAgreement();
        $item1->tradeAgreement->grossPrice = TradePrice::create('170');
        $item1->tradeAgreement->netPrice = TradePrice::create('158.88');

        $item1->delivery = new LineTradeDelivery();
        $item1->delivery->billedQuantity = Quantity::create('1', 'C62');

        $item1->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item1->specifiedLineTradeSettlement->tradeTax[] = $item1tax = new TradeTax();
        $item1tax->typeCode = 'VAT';
        $item1tax->categoryCode = 'S';
        $item1tax->rateApplicablePercent = '7.00';

        $item1->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('158.88');

        $invoice->supplyChainTradeTransaction->lineItems[] = $item2 = new SupplyChainTradeLineItem();
        $item2->associatedDocumentLineDocument = DocumentLineDocument::create('2');

        $item2->specifiedTradeProduct = new TradeProduct();
        $item2->specifiedTradeProduct->name = 'Verpflegung Frühstück';

        $item2->tradeAgreement = new LineTradeAgreement();
        $item2->tradeAgreement->grossPrice = TradePrice::create('14.00');
        $item2->tradeAgreement->netPrice = TradePrice::create('11.76');

        $item2->delivery = new LineTradeDelivery();
        $item2->delivery->billedQuantity = Quantity::create('1', 'C62');

        $item2->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item2->specifiedLineTradeSettlement->tradeTax[] = $item2tax = new TradeTax();
        $item2tax->typeCode = 'VAT';
        $item2tax->categoryCode = 'S';
        $item2tax->rateApplicablePercent = '19.00';

        $item2->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('11.76');

        $invoice->supplyChainTradeTransaction->lineItems[] = $item3 = new SupplyChainTradeLineItem();
        $item3->associatedDocumentLineDocument = DocumentLineDocument::create('3');

        $item3->specifiedTradeProduct = new TradeProduct();
        $item3->specifiedTradeProduct->name = 'Fahrtkosten, Taxi Berlin';

        $item3->tradeAgreement = new LineTradeAgreement();
        $item3->tradeAgreement->grossPrice = TradePrice::create('25.00');
        $item3->tradeAgreement->netPrice = TradePrice::create('23.36');

        $item3->delivery = new LineTradeDelivery();
        $item3->delivery->billedQuantity = Quantity::create('1', 'C62');

        $item3->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item3->specifiedLineTradeSettlement->tradeTax[] = $item3tax = new TradeTax();
        $item3tax->typeCode = 'VAT';
        $item3tax->categoryCode = 'S';
        $item3tax->rateApplicablePercent = '7.00';

        $item3->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('23.36');

        $invoice->supplyChainTradeTransaction->lineItems[] = $item4 = new SupplyChainTradeLineItem();
        $item4->associatedDocumentLineDocument = DocumentLineDocument::create('4');

        $item4->specifiedTradeProduct = new TradeProduct();
        $item4->specifiedTradeProduct->name = 'Fahrtkosten, Taxi Nürnberg';

        $item4->tradeAgreement = new LineTradeAgreement();
        $item4->tradeAgreement->grossPrice = TradePrice::create('21.50');
        $item4->tradeAgreement->netPrice = TradePrice::create('20.09');

        $item4->delivery = new LineTradeDelivery();
        $item4->delivery->billedQuantity = Quantity::create('1', 'C62');

        $item4->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item4->specifiedLineTradeSettlement->tradeTax[] = $item4tax = new TradeTax();
        $item4tax->typeCode = 'VAT';
        $item4tax->categoryCode = 'S';
        $item4tax->rateApplicablePercent = '7.00';

        $item4->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('20.09');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerReference = '04011000-12345-34';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->id = Id::create('1034567');
        $buyerTradeParty->name = 'Max Mustermann';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->globalID[] = Id::create('4000001123452', '0088');
        $sellerTradeParty->name = 'Lieferant GmbH';
        $sellerTradeParty->definedTradeContact = new TradeContact();
        $sellerTradeParty->definedTradeContact->personName = 'Max Mustermann';
        $sellerTradeParty->definedTradeContact->departmentName = 'Muster-Einkauf';
        $sellerTradeParty->definedTradeContact->telephoneUniversalCommunication = new UniversalCommunication();
        $sellerTradeParty->definedTradeContact->telephoneUniversalCommunication->completeNumber = '+49891234567';
        $sellerTradeParty->definedTradeContact->emailURIUniversalCommunication = new UniversalCommunication();
        $sellerTradeParty->definedTradeContact->emailURIUniversalCommunication->uriid = Id::create('Max@Mustermann.de');

        $sellerTradeParty->postalTradeAddress = new TradeAddress();
        $sellerTradeParty->postalTradeAddress->postcode = '80333';
        $sellerTradeParty->postalTradeAddress->lineOne = 'Lieferantenstraße 20';
        $sellerTradeParty->postalTradeAddress->city = 'München';
        $sellerTradeParty->postalTradeAddress->countryCode = 'DE';

        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('201/113/40209', 'FC');
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('DE123456789', 'VA');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->id = Id::create('GE2020211');
        $buyerTradeParty->name = 'Kunden AG Mitte';

        $buyerTradeParty->postalTradeAddress = new TradeAddress();
        $buyerTradeParty->postalTradeAddress->postcode = '69876';
        $buyerTradeParty->postalTradeAddress->lineOne = 'Kundenstraße 15';
        $buyerTradeParty->postalTradeAddress->city = 'Frankfurt';
        $buyerTradeParty->postalTradeAddress->countryCode = 'DE';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery = new HeaderTradeDelivery();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery->shipToTradeParty = $shipToTradeParty = new TradeParty();
        $shipToTradeParty->name = 'Musterfirma Nürnberg';
        $shipToTradeParty->postalTradeAddress = new TradeAddress();
        $shipToTradeParty->postalTradeAddress->postcode = '75319';
        $shipToTradeParty->postalTradeAddress->lineOne = 'Am Bahnhof 42';
        $shipToTradeParty->postalTradeAddress->city = 'Nürnberg';
        $shipToTradeParty->postalTradeAddress->countryCode = 'DE';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->additionalReferencedDocuments[] = $additionalReferencedDocument = new ReferencedDocument();
        $additionalReferencedDocument->name = 'Hotelrechnung';
        $additionalReferencedDocument->issuerAssignedID = Id::create('Hotelrechung');
        $additionalReferencedDocument->typeCode = '916';
        $additionalReferencedDocument->attachmentBinaryObject = $additionalReferencedDocumentBinaryObject = new BinaryObject();
        $additionalReferencedDocumentBinaryObject->filename = 'Hotelrechnung-Immo.pdf';
        $additionalReferencedDocumentBinaryObject->mimeCode = 'application/pdf';
        $additionalReferencedDocumentBinaryObject->value = base64_encode(file_get_contents(__DIR__ . '/Examples/Attachments/EN16931_Betriebskostenabrechnung_Abrechnung 2010.pdf'));

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementPaymentMeans[] = $paymentMeans1 = new TradeSettlementPaymentMeans();
        $paymentMeans1->typeCode = '58';
        $paymentMeans1->information = 'Zahlung per SEPA Überweisung.';
        $paymentMeans1->payeePartyCreditorFinancialAccount = new CreditorFinancialAccount();
        $paymentMeans1->payeePartyCreditorFinancialAccount->ibanId = Id::create('DE02120300000000202051');
        $paymentMeans1->payeePartyCreditorFinancialAccount->AccountName = 'Kunden AG';
        $paymentMeans1->payeeSpecifiedCreditorFinancialInstitution = new CreditorFinancialInstitution();
        $paymentMeans1->payeeSpecifiedCreditorFinancialInstitution->bicId = Id::create('BYLADEM1001');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->tradeTaxes[] = $headerTax1 = new TradeTax();
        $headerTax1->typeCode = 'VAT';
        $headerTax1->categoryCode = 'S';
        $headerTax1->basisAmount = Amount::create('202.33');
        $headerTax1->calculatedAmount = Amount::create('14.16');
        $headerTax1->rateApplicablePercent = '7.00';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->tradeTaxes[] = $headerTax2 = new TradeTax();
        $headerTax2->typeCode = 'VAT';
        $headerTax2->categoryCode = 'S';
        $headerTax2->basisAmount = Amount::create('11.76');
        $headerTax2->calculatedAmount = Amount::create('2.23');
        $headerTax2->rateApplicablePercent = '19.00';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->billingSpecifiedPeriod = $billingPeriod = new Period();
        $billingPeriod->startDatetime = DateTime::create(102, '20180709');
        $billingPeriod->endDatetime = DateTime::create(102, '20180711');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradePaymentTerms[] = $paymentTerms = new TradePaymentTerms();
        $paymentTerms->description = 'Zahlbar innerhalb 30 Tagen netto bis 12.08.2018, 3% Skonto innerhalb 10 Tagen bis 15.03.2018';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementHeaderMonetarySummation = $summation = new TradeSettlementHeaderMonetarySummation();
        $summation->lineTotalAmount = Amount::create('214.09');
        $summation->chargeTotalAmount = Amount::create('0.00');
        $summation->allowanceTotalAmount = Amount::create('0.00');
        $summation->taxBasisTotalAmount[] = Amount::create('214.09');
        $summation->taxTotalAmount[] = Amount::create('16.39', 'EUR');
        $summation->grandTotalAmount[] = Amount::create('230.48');
        $summation->totalPrepaidAmount = Amount::create('0.00');
        $summation->duePayableAmount = Amount::create('230.48');

        $this->validateWithKositValidator(Transformer::create()->transform($invoice));

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/XRECHNUNG_Reisekostenabrechnung.xml',
            SchemaValidator::SCHEMA_EN16931
        );
    }
);

test(
    'building XRechnung CII document for XRECHNUNG_Betriebskostenabrechnung.xml',
    function () {
        $invoice = DocumentFactory::createXRechnungCIIInvoice();
        $invoice->exchangedDocument->id = '471102';
        $invoice->exchangedDocument->typeCode = '380';
        $invoice->exchangedDocument->issueDateTime = DateTime::create(102, '20180305');

        $invoice->exchangedDocument->notes[] = Note::create('Rechnung gemäß Betriebskostenrechnung vom 21.11.2011.');
        $invoice->exchangedDocument->notes[] = Note::create('Grundbesitz GmbH & Co.
            Musterstraße 42
            75645 Frankfurt
            Deutschland
            Geschäftsführer: Hans Muster
            Handelsregisternummer: H A 123
         ', 'REG');

        $invoice->supplyChainTradeTransaction = new SupplyChainTradeTransaction();
        $invoice->supplyChainTradeTransaction->lineItems[] = $item1 = new SupplyChainTradeLineItem();
        $item1->associatedDocumentLineDocument = DocumentLineDocument::create('1');

        $item1->specifiedTradeProduct = new TradeProduct();
        $item1->specifiedTradeProduct->name = 'Abrechnungskreis 1';
        $item1->specifiedTradeProduct->globalID = Id::create('4012345001235', '0160');

        $item1->tradeAgreement = new LineTradeAgreement();
        $item1->tradeAgreement->netPrice = TradePrice::create('15387.08');

        $item1->delivery = new LineTradeDelivery();
        $item1->delivery->billedQuantity = Quantity::create('1.0000', 'C62');

        $item1->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item1->specifiedLineTradeSettlement->tradeTax[] = $item1tax = new TradeTax();
        $item1tax->typeCode = 'VAT';
        $item1tax->categoryCode = 'S';
        $item1tax->rateApplicablePercent = '19';

        $item1->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('15387.08');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerReference = '04011000-12345-34';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->id = Id::create('1034567');
        $buyerTradeParty->name = 'Max Mustermann';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->globalID[] = Id::create('4000001123452', '0088');
        $sellerTradeParty->name = 'Grundbesitz GmbH & Co.';
        $sellerTradeParty->definedTradeContact = new TradeContact();
        $sellerTradeParty->definedTradeContact->personName = 'Max Mustermann';
        $sellerTradeParty->definedTradeContact->departmentName = 'Muster-Einkauf';
        $sellerTradeParty->definedTradeContact->telephoneUniversalCommunication = new UniversalCommunication();
        $sellerTradeParty->definedTradeContact->telephoneUniversalCommunication->completeNumber = '+49891234567';
        $sellerTradeParty->definedTradeContact->emailURIUniversalCommunication = new UniversalCommunication();
        $sellerTradeParty->definedTradeContact->emailURIUniversalCommunication->uriid = Id::create('Max@Mustermann.de');

        $sellerTradeParty->postalTradeAddress = new TradeAddress();
        $sellerTradeParty->postalTradeAddress->postcode = '75645';
        $sellerTradeParty->postalTradeAddress->lineOne = 'Musterstraße 42';
        $sellerTradeParty->postalTradeAddress->city = 'Frankfurt';
        $sellerTradeParty->postalTradeAddress->countryCode = 'DE';

        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('201/113/40209', 'FC');
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('DE136695976', 'VA');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->name = 'Beispielmieter GmbH';
        $buyerTradeParty->postalTradeAddress = new TradeAddress();
        $buyerTradeParty->postalTradeAddress->postcode = '12345';
        $buyerTradeParty->postalTradeAddress->lineOne = 'Verwaltung Straße 40';
        $buyerTradeParty->postalTradeAddress->city = 'Musterstadt';
        $buyerTradeParty->postalTradeAddress->countryCode = 'DE';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery = new HeaderTradeDelivery();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery->shipToTradeParty = $shipToTradeParty = new TradeParty();
        $shipToTradeParty->postalTradeAddress = new TradeAddress();
        $shipToTradeParty->postalTradeAddress->postcode = '12345';
        $shipToTradeParty->postalTradeAddress->lineOne = 'Verwaltung Straße 40';
        $shipToTradeParty->postalTradeAddress->lineTwo = 'Einheit: 5.OG rechts';
        $shipToTradeParty->postalTradeAddress->city = 'Musterstadt';
        $shipToTradeParty->postalTradeAddress->countryCode = 'DE';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->additionalReferencedDocuments[] = $additionalReferencedDocument = new ReferencedDocument();
        $additionalReferencedDocument->name = 'Betriebskostenabrechnung';
        $additionalReferencedDocument->issuerAssignedID = Id::create('Abrechnung 2010');
        $additionalReferencedDocument->typeCode = '916';
        $additionalReferencedDocument->attachmentBinaryObject = $additionalReferencedDocumentBinaryObject = new BinaryObject();
        $additionalReferencedDocumentBinaryObject->filename = 'Betriebskostenabrechnung.pdf';
        $additionalReferencedDocumentBinaryObject->mimeCode = 'application/pdf';
        $additionalReferencedDocumentBinaryObject->value = base64_encode(file_get_contents(__DIR__ . '/Examples/Attachments/EN16931_Betriebskostenabrechnung_Abrechnung 2010.pdf'));

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementPaymentMeans[] = $paymentMeans1 = new TradeSettlementPaymentMeans();
        $paymentMeans1->typeCode = '58';
        $paymentMeans1->information = 'Zahlung per SEPA Überweisung.';
        $paymentMeans1->payeePartyCreditorFinancialAccount = new CreditorFinancialAccount();
        $paymentMeans1->payeePartyCreditorFinancialAccount->ibanId = Id::create('DE02120300000000202051');
        $paymentMeans1->payeePartyCreditorFinancialAccount->AccountName = 'Kunden AG';
        $paymentMeans1->payeeSpecifiedCreditorFinancialInstitution = new CreditorFinancialInstitution();
        $paymentMeans1->payeeSpecifiedCreditorFinancialInstitution->bicId = Id::create('BYLADEM1001');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->tradeTaxes[] = $headerTax1 = new TradeTax();
        $headerTax1->typeCode = 'VAT';
        $headerTax1->categoryCode = 'S';
        $headerTax1->basisAmount = Amount::create('15387.08');
        $headerTax1->calculatedAmount = Amount::create('2923.55');
        $headerTax1->rateApplicablePercent = '19.00';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->billingSpecifiedPeriod = $billingPeriod = new Period();
        $billingPeriod->startDatetime = DateTime::create(102, '20100101');
        $billingPeriod->endDatetime = DateTime::create(102, '20101231');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradePaymentTerms[] = $paymentTerms = new TradePaymentTerms();
        $paymentTerms->dueDate = DateTime::create(102, '20180404');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementHeaderMonetarySummation = $summation = new TradeSettlementHeaderMonetarySummation();
        $summation->lineTotalAmount = Amount::create('15387.08');
        $summation->chargeTotalAmount = Amount::create('0.00');
        $summation->allowanceTotalAmount = Amount::create('0.00');
        $summation->taxBasisTotalAmount[] = Amount::create('15387.08');
        $summation->taxTotalAmount[] = Amount::create('2923.55', 'EUR');
        $summation->grandTotalAmount[] = Amount::create('18310.63');
        $summation->totalPrepaidAmount = Amount::create('17808.00');
        $summation->duePayableAmount = Amount::create('502.63');

        $this->validateWithKositValidator(Transformer::create()->transform($invoice));

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/XRECHNUNG_Betriebskostenabrechnung.xml',
            SchemaValidator::SCHEMA_EN16931
        );
    }
);
