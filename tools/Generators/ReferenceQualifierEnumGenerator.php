<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\ReferenceQualifier;
use easybill\eInvoicingTools\CodeList;
use easybill\eInvoicingTools\EnumFileWriter;
use easybill\eInvoicingTools\ReleasedCases;

require __DIR__ . '/../../vendor/autoload.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/ReferenceQualifier.php';

$released = ReleasedCases::load(ENUM_FILE, ReferenceQualifier::class);
$writer = EnumFileWriter::for(ReferenceQualifier::class, 'string', ENUM_FILE);
$codes = [];

foreach (CodeList::rows(__DIR__ . '/Input/ReferenceQualifier.csv') as [$code, $name]) {
    $codes[] = $code;

    $writer->addCase($released->nameFor($code) ?? $code, $code, $name);
}

foreach ($released->retained($codes) as $case) {
    $writer->addCase($case->name, $case->value);
}

$writer->write();
