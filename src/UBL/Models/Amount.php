<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use easybill\eInvoicing\Enums\CurrencyCode;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Amount
{
    #[Type(CurrencyCode::class)]
    #[XmlAttribute]
    #[SerializedName('currencyID')]
    public ?CurrencyCode $currencyID = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;
}