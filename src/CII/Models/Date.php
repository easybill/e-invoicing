<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Date
{
    #[Type(DateString::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100')]
    #[SerializedName('DateString')]
    public DateString $dateTimeString;

    public static function create(int $format, string $value): self
    {
        $self = new self();
        $self->dateTimeString = DateString::create($format, $value);
        return $self;
    }
}
