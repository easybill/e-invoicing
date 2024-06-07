<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation as JMS;

final class BinaryObject
{
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    #[JMS\SerializedName('mimeCode')]
    public string $mimeCode;

    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    #[JMS\SerializedName('filename')]
    public string $filename;

    #[JMS\Type('string')]
    #[JMS\XmlValue(cdata: false)]
    public string $value;
}
