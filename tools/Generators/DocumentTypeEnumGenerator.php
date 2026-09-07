<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\DocumentType;
use easybill\eInvoicingTools\CodeList;
use easybill\eInvoicingTools\EnumFileWriter;
use easybill\eInvoicingTools\ReleasedCases;

require __DIR__ . '/../../vendor/autoload.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/DocumentType.php';

function caseName(string $description, string $code): string
{
    $caseName = strtoupper((string) preg_replace('/[^a-zA-Z0-9]+/', '_', $description));
    $caseName = (string) preg_replace('/^[0-9]+/', '', $caseName);

    return $caseName === '' ? 'CODE_' . $code : $caseName;
}

$released = ReleasedCases::load(ENUM_FILE, DocumentType::class);
$writer = EnumFileWriter::for(DocumentType::class, 'int', ENUM_FILE);
$codes = [];

foreach (CodeList::rows(__DIR__ . '/Input/DocumentTypes.csv') as [$code, $name, $interpretation]) {
    $codes[] = $code;

    $writer->addCase(
        $released->nameFor($code) ?? caseName($name, $code),
        (int) $code,
        sprintf('Applicable for %s.', $interpretation),
    );
}

foreach ($released->retained($codes) as $case) {
    $writer->addCase($case->name, $case->value);
}

$writer->write();
