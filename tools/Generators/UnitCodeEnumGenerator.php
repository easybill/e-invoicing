<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\UnitCode;
use easybill\eInvoicingTools\CodeList;
use easybill\eInvoicingTools\EnumFileWriter;
use easybill\eInvoicingTools\ReleasedCases;

require __DIR__ . '/../../vendor/autoload.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/UnitCode.php';

$released = ReleasedCases::load(ENUM_FILE, UnitCode::class);
$writer = EnumFileWriter::for(UnitCode::class, 'string', ENUM_FILE);
$codes = [];

foreach (CodeList::rows(__DIR__ . '/Input/UnitCodes.csv') as [$code, $name]) {
    $codes[] = $code;
    $caseName = is_numeric(substr($code, 0, 1)) ? '_' . $code : $code;

    $writer->addCase($released->nameFor($code) ?? $caseName, $code, $name);
}

foreach ($released->retained($codes) as $case) {
    $writer->addCase($case->name, $case->value);
}

$writer->write();
