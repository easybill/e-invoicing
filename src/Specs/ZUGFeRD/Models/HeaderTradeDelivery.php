<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class HeaderTradeDelivery
{
    #[Type(TradeParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ShipToTradeParty')]
    public ?TradeParty $shipToTradeParty = null;

    #[Type(SupplyChainEvent::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ActualDeliverySupplyChainEvent')]
    public ?SupplyChainEvent $chainEvent = null;

    #[Type(ReferencedDocument::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('DeliveryNoteReferencedDocument')]
    public ?ReferencedDocument $deliveryNoteReferencedDocument = null;
}
