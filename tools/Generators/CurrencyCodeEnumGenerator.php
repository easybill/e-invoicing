<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\CurrencyCode;
use easybill\eInvoicingTools\CodeList;
use easybill\eInvoicingTools\EnumFileWriter;
use easybill\eInvoicingTools\ReleasedCases;

require __DIR__ . '/../../vendor/autoload.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/CurrencyCode.php';

$released = ReleasedCases::load(ENUM_FILE, CurrencyCode::class);
$writer = EnumFileWriter::for(CurrencyCode::class, 'string', ENUM_FILE);
$codes = [];

foreach (CodeList::rows(__DIR__ . '/Input/CurrencyCodes.csv') as [$name, $code]) {
    $codes[] = $code;

    $writer->addCase($released->nameFor($code) ?? $code, $code, $name);
}

foreach ($released->retained($codes) as $case) {
    $writer->addCase($case->name, $case->value);
}

$writer->write();
