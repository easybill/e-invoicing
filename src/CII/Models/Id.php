<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Id
{
    #[Type(StringValue::class)]
    #[XmlAttribute]
    #[SerializedName('schemeID')]
    public ?string $schemeID = null;

    #[Type(StringValue::class)]
    #[XmlValue(cdata: false)]
    public string $value;

    public static function create(string $id, ?string $schemeID = null): self
    {
        $self = new self();
        $self->value = $id;
        $self->schemeID = $schemeID;
        return $self;
    }
}
