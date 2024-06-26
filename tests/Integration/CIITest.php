<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\CII\Models\Amount;
use easybill\eInvoicing\CII\Models\DateTime;
use easybill\eInvoicing\CII\Models\DocumentContextParameter;
use easybill\eInvoicing\CII\Models\DocumentLineDocument;
use easybill\eInvoicing\CII\Models\ExchangedDocument;
use easybill\eInvoicing\CII\Models\ExchangedDocumentContext;
use easybill\eInvoicing\CII\Models\HeaderTradeAgreement;
use easybill\eInvoicing\CII\Models\HeaderTradeDelivery;
use easybill\eInvoicing\CII\Models\HeaderTradeSettlement;
use easybill\eInvoicing\CII\Models\Id;
use easybill\eInvoicing\CII\Models\LineTradeAgreement;
use easybill\eInvoicing\CII\Models\LineTradeDelivery;
use easybill\eInvoicing\CII\Models\LineTradeSettlement;
use easybill\eInvoicing\CII\Models\Note;
use easybill\eInvoicing\CII\Models\Quantity;
use easybill\eInvoicing\CII\Models\SupplyChainEvent;
use easybill\eInvoicing\CII\Models\SupplyChainTradeLineItem;
use easybill\eInvoicing\CII\Models\SupplyChainTradeTransaction;
use easybill\eInvoicing\CII\Models\TaxRegistration;
use easybill\eInvoicing\CII\Models\TradeAddress;
use easybill\eInvoicing\CII\Models\TradeParty;
use easybill\eInvoicing\CII\Models\TradePaymentTerms;
use easybill\eInvoicing\CII\Models\TradePrice;
use easybill\eInvoicing\CII\Models\TradeProduct;
use easybill\eInvoicing\CII\Models\TradeSettlementHeaderMonetarySummation;
use easybill\eInvoicing\CII\Models\TradeSettlementLineMonetarySummation;
use easybill\eInvoicing\CII\Models\TradeTax;
use easybill\eInvoicing\Transformer;
use easybill\eInvoicingTests\Validators\SchemaValidator;

test(
    'building ZUGFeRD CII document for EN16931_Einfach.xml',
    function () {
        $invoice = new CrossIndustryInvoice();
        $invoice->exchangedDocument = new ExchangedDocument();
        $invoice->exchangedDocumentContext = new ExchangedDocumentContext();
        $invoice->exchangedDocumentContext->documentContextParameter = new DocumentContextParameter();
        $invoice->exchangedDocumentContext->documentContextParameter->id = 'urn:cen.eu:en16931:2017';
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
        $item1->specifiedTradeProduct->globalID = Id::create('4012345001235', '0160');
        $item1->specifiedTradeProduct->sellerAssignedID = 'TB100A4';

        $item1->tradeAgreement = new LineTradeAgreement();
        $item1->tradeAgreement->grossPrice = TradePrice::create('9.9000');
        $item1->tradeAgreement->netPrice = TradePrice::create('9.9000');

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
        $item2->specifiedTradeProduct->globalID = Id::create('4000050986428', '0160');
        $item2->specifiedTradeProduct->sellerAssignedID = 'ARNR2';

        $item2->tradeAgreement = new LineTradeAgreement();
        $item2->tradeAgreement->grossPrice = TradePrice::create('5.5000');
        $item2->tradeAgreement->netPrice = TradePrice::create('5.5000');

        $item2->delivery = new LineTradeDelivery();
        $item2->delivery->billedQuantity = Quantity::create('50.0000', 'H87');

        $item2->specifiedLineTradeSettlement = new LineTradeSettlement();
        $item2->specifiedLineTradeSettlement->tradeTax[] = $item2tax = new TradeTax();
        $item2tax->typeCode = 'VAT';
        $item2tax->categoryCode = 'S';
        $item2tax->rateApplicablePercent = '7.00';
        $item2->specifiedLineTradeSettlement->monetarySummation = TradeSettlementLineMonetarySummation::create('275.00');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->id = Id::create('549910');
        $sellerTradeParty->globalID[] = Id::create('4000001123452', '0088');
        $sellerTradeParty->name = 'Lieferant GmbH';
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
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery->chainEvent = $supplyChainEvent = new SupplyChainEvent();
        $supplyChainEvent->date = DateTime::create(102, '20180305');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';

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

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/CII/EN16931_Einfach.xml',
            SchemaValidator::SCHEMA_EN16931
        );

        $xml = Transformer::create()->transformToXml($invoice);
        $xml = $this->reformatXml($xml);

        // This is possible due to the EN16931 profile. XRechnung (KOSIT) is able to validate CII documents, as the XRechnung specification allows both (CII and UBL) syntax.
        // XRechnung CII is an extension to ZUGFeRD EN16931 profile.
        $this->validateWithKositValidator($xml);
    }
);
