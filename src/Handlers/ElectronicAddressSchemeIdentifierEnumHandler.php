<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\ElectronicAddressSchemeIdentifier;
use easybill\eInvoicing\Enums\UnitCode;

final class ElectronicAddressSchemeIdentifierEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        return ElectronicAddressSchemeIdentifier::class;
    }
}
