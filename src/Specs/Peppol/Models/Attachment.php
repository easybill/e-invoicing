<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\Peppol\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Attachment
{
    #[Type(EmbeddedDocumentBinaryObject::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('EmbeddedDocumentBinaryObject')]
    public ?EmbeddedDocumentBinaryObject $embeddedDocumentBinaryObject = null;

    #[Type(ExternalReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ExternalReference')]
    public ?ExternalReference $externalReference = null;
}
