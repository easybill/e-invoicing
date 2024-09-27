<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use easybill\eInvoicing\Enums\CurrencyCode;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Amount
{
    #[Type(StringValue::class)]
    #[XmlValue(cdata: false)]
    public string $value;

    #[Type(CurrencyCode::class)]
    #[XmlAttribute]
    #[SerializedName('currencyID')]
    public ?CurrencyCode $currency = null;

    public static function create(string $amount, ?CurrencyCode $currency = null): self
    {
        $self = new self();
        $self->value = $amount;
        $self->currency = $currency;
        return $self;
    }
}
