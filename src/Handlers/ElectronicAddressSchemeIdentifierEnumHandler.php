<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\ElectronicAddressScheme;

final class ElectronicAddressSchemeIdentifierEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        return ElectronicAddressScheme::class;
    }
}
