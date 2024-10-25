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
    #[Type('array<' . TradeTax::class . '>')]
    #[XmlList(entry: 'ApplicableTradeTax', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeTax = [];

    /** @var TradeAllowanceCharge[] */
    #[Type('array<' . TradeAllowanceCharge::class . '>')]
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
    #[Type('array<' . TradeAccountingAccount::class . '>')]
    #[XmlList(entry: 'ReceivableSpecifiedTradeAccountingAccount', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeAccountingAccount = [];

    /** @var ReferencedDocument[] */
    #[Type('array<' . ReferencedDocument::class . '>')]
    #[XmlList(entry: 'AdditionalReferencedDocument', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $additionalReferencedDocument = [];
}
