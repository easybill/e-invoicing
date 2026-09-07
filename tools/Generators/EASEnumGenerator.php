<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\ElectronicAddressScheme;
use easybill\eInvoicingTools\CodeList;
use easybill\eInvoicingTools\EnumFileWriter;
use easybill\eInvoicingTools\ReleasedCases;

require __DIR__ . '/../../vendor/autoload.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/ElectronicAddressScheme.php';

function caseName(string $description): string
{
    $case = strtoupper((string) preg_replace('/[^a-zA-Z0-9]+/', '_', $description));

    return rtrim(substr(trim($case, '_'), 0, 64), '_');
}

$released = ReleasedCases::load(ENUM_FILE, ElectronicAddressScheme::class);
$writer = EnumFileWriter::for(ElectronicAddressScheme::class, 'string', ENUM_FILE);
$codes = [];

foreach (CodeList::rows(__DIR__ . '/Input/ElectronicAddressSchemeCodes.csv') as [$code, $description]) {
    $codes[] = $code;

    $writer->addCase($released->nameFor($code) ?? caseName($description), $code);
}

foreach ($released->retained($codes) as $case) {
    $writer->addCase($case->name, $case->value);
}

$writer->write();
