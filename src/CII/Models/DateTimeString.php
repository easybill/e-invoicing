<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation as JMS;

final class DateTimeString
{
    #[JMS\Type('integer')]
    #[JMS\XmlAttribute]
    public int $format;

    #[JMS\Type(StringValue::class)]
    #[JMS\XmlValue(cdata: false)]
    public string $value;

    public static function create(int $format, string $value): self
    {
        $self = new self();
        $self->format = $format;
        $self->value = $value;
        return $self;
    }
}
