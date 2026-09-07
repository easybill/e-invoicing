<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\ReferenceQualifier;

require_once __DIR__ . '/EnumSupport.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/ReferenceQualifier.php';

/** @param array<string, string> $references description keyed by code */
function generateEnum(array $references): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum ReferenceQualifier: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    $released = releasedCases(ENUM_FILE, ReferenceQualifier::class);

    foreach ($references as $code => $name) {
        $code = (string) $code; // numeric codes become int array keys

        $enumCode .= '    // ' . $name . "\n";
        $enumCode .= '    case ' . ($released[$code]?->name ?? $code) . " = '" . $code . "';\n\n";
    }

    $enumCode .= retainedCases($released, codesOf($references));
    $enumCode .= "}\n";
    return $enumCode;
}

$references = parseCSVFile(__DIR__ . '/input/ReferenceQualifier.csv');

file_put_contents(ENUM_FILE, "<?php\n\n" . generateEnum($references));
