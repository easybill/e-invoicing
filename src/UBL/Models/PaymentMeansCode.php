<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class PaymentMeansCode
{
    #[Type(StringValue::class)]
    #[XmlAttribute]
    #[SerializedName('name')]
    public ?string $name = null;

    #[Type(StringValue::class)]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
