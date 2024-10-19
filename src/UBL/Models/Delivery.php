<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Delivery
{
    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ActualDeliveryDate')]
    public ?string $actualDeliveryDate = null;

    #[Type(DeliveryLocation::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('DeliveryLocation')]
    public ?DeliveryLocation $deliveryLocation = null;

    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('DeliveryParty')]
    public ?Party $deliveryParty = null;
}
