<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use easybill\eInvoicing\Enums\CountryCode;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Country
{
    #[Type(CountryCode::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('IdentificationCode')]
    public ?CountryCode $identificationCode = null;
}
