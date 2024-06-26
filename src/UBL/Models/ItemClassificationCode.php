<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class ItemClassificationCode
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('listID')]
    public ?string $listId = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
