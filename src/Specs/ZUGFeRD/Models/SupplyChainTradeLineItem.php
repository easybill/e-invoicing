<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class SupplyChainTradeLineItem
{
    #[Type(DocumentLineDocument::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('AssociatedDocumentLineDocument')]
    public DocumentLineDocument $associatedDocumentLineDocument;

    #[Type(TradeProduct::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedTradeProduct')]
    public TradeProduct $specifiedTradeProduct;

    #[Type(LineTradeAgreement::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedLineTradeAgreement')]
    public LineTradeAgreement $tradeAgreement;

    #[Type(LineTradeDelivery::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedLineTradeDelivery')]
    public ?LineTradeDelivery $delivery = null;

    #[Type(LineTradeSettlement::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedLineTradeSettlement')]
    public LineTradeSettlement $specifiedLineTradeSettlement;
}
