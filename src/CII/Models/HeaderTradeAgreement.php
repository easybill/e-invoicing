<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

#[AccessorOrder(order: 'custom', custom: [
    'buyerReference',
    'sellerTradeParty',
    'buyerTradeParty',
    'sellerTaxRepresentativeTradeParty',
    'buyerTaxRepresentativeTradeParty',
    'sellerOrderReferencedDocument',
    'buyerOrderReferencedDocument',
    'contractReferencedDocument',
    'additionalReferencedDocuments',
    'specifiedProcuringProject',
])]
final class HeaderTradeAgreement
{
    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BuyerReference')]
    public ?string $buyerReference = null;

    #[Type(TradeParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SellerTradeParty')]
    public TradeParty $sellerTradeParty;

    #[Type(TradeParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SellerTaxRepresentativeTradeParty')]
    public ?TradeParty $sellerTaxRepresentativeTradeParty = null;

    #[Type(TradeParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BuyerTradeParty')]
    public TradeParty $buyerTradeParty;

    #[Type(TradeParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BuyerTaxRepresentativeTradeParty')]
    public ?TradeParty $buyerTaxRepresentativeTradeParty = null;

    #[Type(ReferencedDocument::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SellerOrderReferencedDocument')]
    public ?ReferencedDocument $sellerOrderReferencedDocument = null;

    #[Type(ReferencedDocument::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BuyerOrderReferencedDocument')]
    public ?ReferencedDocument $buyerOrderReferencedDocument = null;

    #[Type(ReferencedDocument::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ContractReferencedDocument')]
    public ?ReferencedDocument $contractReferencedDocument = null;

    /** @var ReferencedDocument[] */
    #[Type('array<easybill\eInvoicing\CII\Models\ReferencedDocument>')]
    #[XmlList(entry: 'AdditionalReferencedDocument', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $additionalReferencedDocuments = [];

    #[Type(ProcuringProject::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('SpecifiedProcuringProject')]
    public ?ProcuringProject $specifiedProcuringProject = null;
}
