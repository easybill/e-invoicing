<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use easybill\eInvoicing\Enums\ElectronicAddressSchemeIdentifier;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class EndpointId
{
    #[Type(ElectronicAddressSchemeIdentifier::class)]
    #[XmlAttribute]
    #[SerializedName('schemeID')]
    public ?ElectronicAddressSchemeIdentifier $schemeID = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
