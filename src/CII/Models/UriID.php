<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use easybill\eInvoicing\Enums\ElectronicAddressScheme;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class UriID
{
    #[Type(ElectronicAddressScheme::class)]
    #[XmlAttribute]
    #[SerializedName('schemeID')]
    public ?ElectronicAddressScheme $schemeID = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public string $value;

    public static function create(string $id, ?ElectronicAddressScheme $schemeID = null): self
    {
        $self = new self();
        $self->value = $id;
        $self->schemeID = $schemeID;
        return $self;
    }
}
