<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class EmbeddedDocumentBinaryObject
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('mimeCode')]
    public ?string $mimeCode = null;

    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('filename')]
    public ?string $filename = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}
