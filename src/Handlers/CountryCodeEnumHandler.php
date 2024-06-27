<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\CountryCode;

final class CountryCodeEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string */
    public static function getEnumClass(): string
    {
        return CountryCode::class;
    }
}
