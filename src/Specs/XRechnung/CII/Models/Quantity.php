<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Quantity
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('unitCode')]
    public string $unitCode;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public string $value;

    public static function create(string $value, string $unitCode): self
    {
        $self = new self();
        $self->value = $value;
        $self->unitCode = $unitCode;
        return $self;
    }
}
