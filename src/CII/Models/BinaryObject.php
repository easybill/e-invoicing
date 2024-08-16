<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use easybill\eInvoicing\Enums\MimeType;
use JMS\Serializer\Annotation as JMS;

final class BinaryObject
{
    #[JMS\Type(MimeType::class)]
    #[JMS\XmlAttribute]
    #[JMS\SerializedName('mimeCode')]
    public MimeType $mimeCode;

    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    #[JMS\SerializedName('filename')]
    public string $filename;

    #[JMS\Type('string')]
    #[JMS\XmlValue(cdata: false)]
    public string $value;
}
