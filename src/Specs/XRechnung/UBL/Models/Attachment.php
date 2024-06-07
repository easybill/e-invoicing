<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Attachment
{
    #[Type(EmbeddedDocumentBinaryObject::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('EmbeddedDocumentBinaryObject')]
    public ?EmbeddedDocumentBinaryObject $embeddedDocumentBinaryObject = null;
}
