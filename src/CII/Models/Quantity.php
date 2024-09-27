<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use easybill\eInvoicing\Enums\UnitCode;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Quantity
{
    #[Type(UnitCode::class)]
    #[XmlAttribute]
    #[SerializedName('unitCode')]
    public UnitCode $unitCode;

    #[Type(StringValue::class)]
    #[XmlValue(cdata: false)]
    public string $value;

    public static function create(string $value, UnitCode $unitCode): self
    {
        $self = new self();
        $self->value = $value;
        $self->unitCode = $unitCode;
        return $self;
    }
}
