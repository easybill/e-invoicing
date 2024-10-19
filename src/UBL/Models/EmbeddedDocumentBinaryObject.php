<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use easybill\eInvoicing\Enums\MimeType;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class EmbeddedDocumentBinaryObject
{
    #[Type(MimeType::class)]
    #[XmlAttribute]
    #[SerializedName('mimeCode')]
    public MimeType $mimeCode;

    #[Type(StringValue::class)]
    #[XmlAttribute]
    #[SerializedName('filename')]
    public string $filename;

    #[Type(StringValue::class)]
    #[XmlValue(cdata: false)]
    public string $value;
}
