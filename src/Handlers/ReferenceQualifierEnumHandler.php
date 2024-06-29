<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\ReferenceQualifier;

final class ReferenceQualifierEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        return ReferenceQualifier::class;
    }
}
