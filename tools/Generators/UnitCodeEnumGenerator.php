<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\UnitCode;

require_once __DIR__ . '/EnumSupport.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/UnitCode.php';

/** @param array<string, string> $units description keyed by code */
function generateEnum(array $units): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum UnitCode: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    $released = releasedCases(ENUM_FILE, UnitCode::class);

    foreach ($units as $code => $name) {
        $code = (string) $code; // numeric codes become int array keys
        $caseName = is_numeric(substr($code, 0, 1)) ? '_' . $code : $code;

        $enumCode .= '    // ' . $name . "\n";
        $enumCode .= '    case ' . ($released[$code]?->name ?? $caseName) . " = '" . $code . "';\n\n";
    }

    $enumCode .= retainedCases($released, codesOf($units));
    $enumCode .= "}\n";
    return $enumCode;
}

$units = parseCSVFile(__DIR__ . '/input/UnitCodes.csv');

file_put_contents(ENUM_FILE, "<?php\n\n" . generateEnum($units));
