<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

#[AccessorOrder(order: 'custom', custom: ['tradeTax', 'billingSpecifiedPeriod', 'specifiedTradeAllowanceCharge', 'name', 'description', 'tradeCountry', 'monetarySummation', 'additionalReferencedDocument', 'tradeAccountingAccount'])]
final class LineTradeSettlement
{
    /** @var TradeTax[] */
    #[Type('array<easybill\eInvoicing\CII\Models\TradeTax>')]
    #[XmlList(entry: 'ApplicableTradeTax', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeTax = [];

    /** @var TradeAllowanceCharge[] */
    #[Type('array<easybill\eInvoicing\CII\Models\TradeAllowanceCharge>')]
    #[XmlList(entry: 'SpecifiedTradeAllowanceCharge', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradeAllowanceCharge = [];

    #[Type(Period::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BillingSpecifiedPeriod')]
    public ?Period $billingSpecifiedPeriod = null;

    #[Type(TradeSettlementLineMonetarySummation::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedTradeSettlementLineMonetarySummation')]
    public TradeSettlementLineMonetarySummation $monetarySummation;

    /** @var TradeAccountingAccount[] */
    #[Type('array<easybill\eInvoicing\CII\Models\TradeAccountingAccount>')]
    #[XmlList(entry: 'ReceivableSpecifiedTradeAccountingAccount', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeAccountingAccount = [];

    /** @var ReferencedDocument[] */
    #[Type('array<easybill\eInvoicing\CII\Models\ReferencedDocument>')]
    #[XmlList(entry: 'AdditionalReferencedDocument', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $additionalReferencedDocument = [];
}
