<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class SupplyChainTradeTransaction
{
    /**
     * @var SupplyChainTradeLineItem[]
     */
    #[Type('array<Easybill\eInvoicing\Specs\ZUGFeRD\Models\SupplyChainTradeLineItem>')]
    #[XmlList(entry: 'IncludedSupplyChainTradeLineItem', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $lineItems = [];

    #[Type(HeaderTradeAgreement::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ApplicableHeaderTradeAgreement')]
    public HeaderTradeAgreement $applicableHeaderTradeAgreement;

    #[Type(HeaderTradeDelivery::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ApplicableHeaderTradeDelivery')]
    public HeaderTradeDelivery $applicableHeaderTradeDelivery;

    #[Type(HeaderTradeSettlement::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ApplicableHeaderTradeSettlement')]
    public HeaderTradeSettlement $applicableHeaderTradeSettlement;
}
