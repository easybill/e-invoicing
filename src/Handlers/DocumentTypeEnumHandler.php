<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\Enums\DocumentType;

final class DocumentTypeEnumHandler extends AbstractBackedEnumHandler
{
    /** @return class-string */
    public static function getEnumClass(): string
    {
        return DocumentType::class;
    }
}
