<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class HeaderTradeSettlement
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('CreditorReferenceID')]
    public ?string $creditorReferenceID = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('PaymentReference')]
    public ?string $paymentReference = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('InvoiceCurrencyCode')]
    public string $currency;

    #[Type(TradeParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('PayeeTradeParty')]
    public ?TradeParty $payeeTradeParty = null;

    /**
     * @var TradeSettlementPaymentMeans[]
     */
    #[Type('array<Easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeSettlementPaymentMeans>')]
    #[XmlList(entry: 'SpecifiedTradeSettlementPaymentMeans', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradeSettlementPaymentMeans = [];

    /**
     * @var TradeTax[]
     */
    #[Type('array<Easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeTax>')]
    #[XmlList(entry: 'ApplicableTradeTax', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeTaxes = [];

    #[Type(Period::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BillingSpecifiedPeriod')]
    public ?Period $billingSpecifiedPeriod = null;

    /**
     * @var TradeAllowanceCharge[]
     */
    #[Type('array<Easybill\eInvoicing\Specs\XRechnung\CII\Models\TradeAllowanceCharge>')]
    #[XmlList(entry: 'SpecifiedTradeAllowanceCharge', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradeAllowanceCharge = [];

    /**
     * @var LogisticsServiceCharge[]
     */
    #[Type('array<Easybill\eInvoicing\Specs\XRechnung\CII\Models\LogisticsServiceCharge>')]
    #[XmlList(entry: 'SpecifiedLogisticsServiceCharge', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedLogisticsServiceCharge = [];

    /**
     * @var TradePaymentTerms[]
     */
    #[Type('array<Easybill\eInvoicing\Specs\XRechnung\CII\Models\TradePaymentTerms>')]
    #[XmlList(entry: 'SpecifiedTradePaymentTerms', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradePaymentTerms = [];

    #[Type(TradeSettlementHeaderMonetarySummation::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedTradeSettlementHeaderMonetarySummation')]
    public TradeSettlementHeaderMonetarySummation $specifiedTradeSettlementHeaderMonetarySummation;

    #[Type(ReferencedDocument::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('InvoiceReferencedDocument')]
    public ?ReferencedDocument $invoiceReferencedDocument = null;
}
