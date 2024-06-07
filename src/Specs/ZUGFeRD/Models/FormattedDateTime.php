<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class FormattedDateTime
{
    #[Type(DateTimeString::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:QualifiedDataType:100')]
    #[SerializedName('DateTimeString')]
    public DateTimeString $dateTimeString;

    public static function create(int $format, string $value): self
    {
        $self = new self();
        $self->dateTimeString = DateTimeString::create($format, $value);
        return $self;
    }
}
