<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\Peppol\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class PaymentMeansCode
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('name')]
    public ?string $name = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
