<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\MimeType;

final class MimeTypeEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        return MimeType::class;
    }
}
