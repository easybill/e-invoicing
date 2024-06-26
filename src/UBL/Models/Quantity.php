<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Quantity
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('unitCode')]
    public ?string $unitCode = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
