<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration\ZUGFeRD;

use easybill\eInvoicing\DocumentFactory;
use easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\Amount;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\DateTime;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\HeaderTradeAgreement;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\HeaderTradeDelivery;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\HeaderTradeSettlement;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\SupplyChainTradeTransaction;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\TaxRegistration;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeAddress;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeParty;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\TradeSettlementHeaderMonetarySummation;
use easybill\eInvoicingTests\Validators\SchemaValidator;

test(
    'building ZUGFeRD cii document for MINIMUM_Rechnung.xml',
    function () {
        $invoice = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::MINIMUM);
        $invoice->exchangedDocument->id = '471102';
        $invoice->exchangedDocument->typeCode = '380';
        $invoice->exchangedDocument->issueDateTime = DateTime::create(102, '20200305');

        $invoice->supplyChainTradeTransaction = new SupplyChainTradeTransaction();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();

        // Seller Trade Party
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->name = 'Lieferant GmbH';
        $sellerTradeParty->postalTradeAddress = new TradeAddress();
        $sellerTradeParty->postalTradeAddress->countryCode = 'DE';
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('201/113/40209', 'FC');
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('DE123456789', 'VA');

        // Buyer Trade Party
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->name = 'Kunden AG Frankreich';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery = new HeaderTradeDelivery();

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementHeaderMonetarySummation = $monetarySummation = new TradeSettlementHeaderMonetarySummation();
        $monetarySummation->taxBasisTotalAmount[] = Amount::create('198.00');
        $monetarySummation->taxTotalAmount[] = Amount::create('37.62', 'EUR');
        $monetarySummation->grandTotalAmount[] = Amount::create('235.62');
        $monetarySummation->duePayableAmount = Amount::create('235.62');

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/MINIMUM/MINIMUM_Rechnung.xml',
            SchemaValidator::SCHEMA_MINIMUM
        );
    }
);

test(
    'building ZUGFeRD cii document for MINIMUM_Buchungshilfe.xml',
    function () {
        $invoice = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::MINIMUM);
        $invoice->exchangedDocument->id = '471102';
        $invoice->exchangedDocument->typeCode = '751';
        $invoice->exchangedDocument->issueDateTime = DateTime::create(102, '20200305');

        $invoice->supplyChainTradeTransaction = new SupplyChainTradeTransaction();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement = new HeaderTradeAgreement();

        // Seller Trade Party
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->sellerTradeParty = $sellerTradeParty = new TradeParty();
        $sellerTradeParty->name = 'Lieferant GmbH';
        $sellerTradeParty->postalTradeAddress = new TradeAddress();
        $sellerTradeParty->postalTradeAddress->countryCode = 'DE';
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('201/113/40209', 'FC');
        $sellerTradeParty->taxRegistrations[] = TaxRegistration::create('DE123456789', 'VA');

        // Buyer Trade Party
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeAgreement->buyerTradeParty = $buyerTradeParty = new TradeParty();
        $buyerTradeParty->name = 'Kunden AG Mitte';

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeDelivery = new HeaderTradeDelivery();

        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement = new HeaderTradeSettlement();
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->currency = 'EUR';
        $invoice->supplyChainTradeTransaction->applicableHeaderTradeSettlement->specifiedTradeSettlementHeaderMonetarySummation = $monetarySummation = new TradeSettlementHeaderMonetarySummation();
        $monetarySummation->taxBasisTotalAmount[] = Amount::create('198.00');
        $monetarySummation->taxTotalAmount[] = Amount::create('37.62', 'EUR');
        $monetarySummation->grandTotalAmount[] = Amount::create('235.62');
        $monetarySummation->duePayableAmount = Amount::create('235.62');

        $this->buildAndAssertXmlFromCII(
            $invoice,
            __DIR__ . '/Examples/MINIMUM/MINIMUM_Buchungshilfe.xml',
            SchemaValidator::SCHEMA_MINIMUM
        );
    }
);
