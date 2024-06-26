<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlValue;

final class Note
{
    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
