<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\CountryCode;

require_once __DIR__ . '/EnumSupport.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/CountryCode.php';

/** @param array<string, string> $countries code keyed by country name */
function generateEnum(array $countries): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum CountryCode: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    $released = releasedCases(ENUM_FILE, CountryCode::class);

    foreach ($countries as $name => $code) {
        $caseName = is_numeric(substr($code, 0, 1)) ? '_' . $code : $code;

        $enumCode .= '    // ' . $name . "\n";
        $enumCode .= '    case ' . ($released[$code]?->name ?? $caseName) . " = '" . $code . "';\n\n";
    }

    $enumCode .= retainedCases($released, array_values($countries));
    $enumCode .= "}\n";
    return $enumCode;
}

$countries = parseCSVFile(__DIR__ . '/input/CountryCodes.csv');

file_put_contents(ENUM_FILE, "<?php\n\n" . generateEnum($countries));
