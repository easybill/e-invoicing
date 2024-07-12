<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class Item
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Description')]
    public ?string $description = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Name')]
    public ?string $name = null;

    #[Type(Identification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('BuyersItemIdentification')]
    public ?Identification $buyersItemIdentification = null;

    #[Type(Identification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('SellersItemIdentification')]
    public ?Identification $sellersItemIdentification = null;

    #[Type(StandardItemIdentification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('StandardItemIdentification')]
    public ?StandardItemIdentification $standardItemIdentification = null;

    #[Type(Country::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OriginCountry')]
    public ?Country $originCountry = null;

    /** @var CommodityClassification[] */
    #[Type('array<easybill\eInvoicing\UBL\Models\CommodityClassification>')]
    #[SerializedName('CommodityClassification')]
    #[XmlList(entry: 'CommodityClassification', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public ?array $commodityClassification = [];

    #[Type(TaxCategory::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ClassifiedTaxCategory')]
    public ?TaxCategory $classifiedTaxCategory = null;

    /** @var ItemProperty[] */
    #[Type('array<easybill\eInvoicing\UBL\Models\ItemProperty>')]
    #[SerializedName('AdditionalItemProperty')]
    #[XmlList(entry: 'AdditionalItemProperty', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $additionalItemProperty = [];
}
