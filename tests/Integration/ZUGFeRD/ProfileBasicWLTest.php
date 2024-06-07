<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Integration\ZUGFeRD;

use Easybill\eInvoicing\DocumentFactory;
use Easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\Amount;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\DateTime;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\HeaderTradeAgreement;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\HeaderTradeDelivery;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\HeaderTradeSettlement;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\Note;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\SupplyChainEvent;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\SupplyChainTradeTransaction;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\TaxRegistration;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeAddress;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeParty;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\TradePaymentTerms;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeSettlementHeaderMonetarySummation;
use Easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeTax;
use Easybill\eInvoicingTests\Validators\SchemaValidator;

test(
    'building ZUGFeRD cii document for BASIC-WL_Einfach.xml',
    function () {
        $invoice = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::BASIC_WL);
        $invoice->exchangedDocument->id = 'TX-471102';
        $invoice->exchangedDocument->typeCode = '380';
        $invoice->exchangedDocument->issueDateTime = DateTime::create(102, '20191030');
        $invoice->exchangedDocument->notes[] = Note::create('Rechnung gemäß Taxifahrt vom 29.10.2019');
        $invoice->exchangedDocument->notes[] = Note::create('Taxiunternehmen TX GmbH
                Lieferantenstraße 20
                10369 Berlin
                Deutschland
                Geschäftsführer: Hans Mustermann
                Handelsregisternummer: H A 123
            ');
        $invoice->exchangedDocument->notes[] = Note::create('Unsere GLN: 4000001123452
                Ihre GLN: 4000001987658
                Ihre Kundennummer: GE2020211
            ');

        $invoice->supplyChainTradeTransaction = new SupplyChainTradeTransaction();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();

        // Seller Trade Party
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->name = 'Taxiunternehmen TX GmbH';
        $sellerTradeParty->postalTradeAddress = new TradeAddress();
        $sellerTradeParty->postalTradeAddress->postcode = '10369';
        $sellerTradeParty->postalTradeAddress->lineOne = 'Lieferantenstraße 20';
        $sellerTradeParty->postalTradeAddress->city = 'Berlin';
        $sellerTradeParty->postalTradeAddress->countryCode = 'DE';
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('DE123456789', 'VA');

        // Buyer Trade Party
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->name = 'Taxi-Gast AG Mitte';
        $buyerTradeParty->postalTradeAddress = new TradeAddress();
        $buyerTradeParty->postalTradeAddress->postcode = '13351';
        $buyerTradeParty->postalTradeAddress->lineOne = 'Hans Mustermann';
        $buyerTradeParty->postalTradeAddress->lineTwo = 'Kundenstraße 15';
        $buyerTradeParty->postalTradeAddress->city = 'Berlin';
        $buyerTradeParty->postalTradeAddress->countryCode = 'DE';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery = new HeaderTradeDelivery();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery->chainEvent = $chainEvent = new SupplyChainEvent();
        $chainEvent->date = DateTime::create(102, '20191029');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->tradeTaxes[] = $headerTax1 = new TradeTax();
        $headerTax1->typeCode = 'VAT';
        $headerTax1->categoryCode = 'S';
        $headerTax1->basisAmount = Amount::create('16.90');
        $headerTax1->calculatedAmount = Amount::create('1.18');
        $headerTax1->rateApplicablePercent = '7';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradePaymentTerms[] = $paymentTerms = new TradePaymentTerms();
        $paymentTerms->dueDate = DateTime::create(102, '20191129');

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementHeaderMonetarySummation = $monetarySummation = new TradeSettlementHeaderMonetarySummation();
        $monetarySummation->lineTotalAmount = Amount::create('16.90');
        $monetarySummation->chargeTotalAmount = Amount::create('0.00');
        $monetarySummation->allowanceTotalAmount = Amount::create('0.00');
        $monetarySummation->taxBasisTotalAmount[] = Amount::create('16.90');
        $monetarySummation->taxTotalAmount[] = Amount::create('1.18', 'EUR');
        $monetarySummation->grandTotalAmount[] = Amount::create('18.08');
        $monetarySummation->duePayableAmount = Amount::create('18.08');

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/BASIC WL/BASIC-WL_Einfach.xml',
            SchemaValidator::SCHEMA_BASIC_WL
        );
    }
);
