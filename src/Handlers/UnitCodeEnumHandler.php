<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\UnitCode;

final class UnitCodeEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        return UnitCode::class;
    }
}
