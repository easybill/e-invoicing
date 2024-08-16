<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\ElectronicAddressScheme;
use easybill\eInvoicing\Enums\UnitCode;

final class ElectronicAddressSchemeIdentifierEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        return ElectronicAddressScheme::class;
    }
}
