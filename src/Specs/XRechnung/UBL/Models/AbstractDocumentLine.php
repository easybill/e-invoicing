<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

abstract class AbstractDocumentLine
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    public ?Id $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Note')]
    public ?string $note = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('LineExtensionAmount')]
    #[Serializer\Groups()]
    public ?Amount $lineExtensionAmount = null;

    #[Type(Period::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('InvoicePeriod')]
    public ?Period $invoicePeriod = null;

    #[Type(OrderLineReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OrderLineReference')]
    public ?OrderLineReference $orderLineReference = null;

    /** @var AllowanceCharge[] */
    #[Type('array<easybill\eInvoicing\Specs\XRechnung\UBL\Models\AllowanceCharge>')]
    #[SerializedName('AllowanceCharge')]
    #[XmlList(entry: 'AllowanceCharge', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $allowanceCharge = [];

    /** @var Item[] */
    #[Type('array<easybill\eInvoicing\Specs\XRechnung\UBL\Models\Item>')]
    #[SerializedName('Item')]
    #[XmlList(entry: 'Item', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $item = [];

    #[Type(Price::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Price')]
    public ?Price $price = null;
}
