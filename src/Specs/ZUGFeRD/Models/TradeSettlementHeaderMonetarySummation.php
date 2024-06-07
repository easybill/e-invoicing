<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\XmlList;

final class TradeSettlementHeaderMonetarySummation
{
    #[JMS\Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('LineTotalAmount')]
    public ?Amount $lineTotalAmount = null;

    #[JMS\Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('ChargeTotalAmount')]
    public ?Amount $chargeTotalAmount = null;

    #[JMS\Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('AllowanceTotalAmount')]
    public ?Amount $allowanceTotalAmount = null;

    /**
     * @var Amount[]
     */
    #[JMS\Type('array<Easybill\eInvoicing\Specs\ZUGFeRD\Models\Amount>')]
    #[XmlList(entry: 'TaxBasisTotalAmount', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $taxBasisTotalAmount = [];

    /**
     * @var Amount[]
     */
    #[JMS\Type('array<Easybill\eInvoicing\Specs\ZUGFeRD\Models\Amount>')]
    #[XmlList(entry: 'TaxTotalAmount', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $taxTotalAmount = [];

    #[JMS\Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('RoundingAmount')]
    public ?Amount $roundingAmount = null;

    /**
     * @var Amount[]
     */
    #[JMS\Type('array<Easybill\eInvoicing\Specs\ZUGFeRD\Models\Amount>')]
    #[XmlList(entry: 'GrandTotalAmount', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $grandTotalAmount = [];

    #[JMS\Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('TotalPrepaidAmount')]
    public ?Amount $totalPrepaidAmount = null;

    #[JMS\Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('DuePayableAmount')]
    public Amount $duePayableAmount;
}
