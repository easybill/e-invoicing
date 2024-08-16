<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Enums;

enum MimeType: string
{
    case PDF = 'application/pdf';
    case PNG = 'image/png';
    case JPG = 'image/jpeg';
    case CSV = 'text/csv';
    case XLS = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    case ODS = 'application/vnd.oasis.opendocument.spreadsheet';
}
