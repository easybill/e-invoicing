<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\CurrencyCode;

require_once __DIR__ . '/EnumSupport.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/CurrencyCode.php';

/** @param array<string, string> $currencies code keyed by currency name */
function generateEnum(array $currencies): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum CurrencyCode: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    $released = releasedCases(ENUM_FILE, CurrencyCode::class);

    foreach ($currencies as $name => $code) {
        $enumCode .= '    // ' . $name . "\n";
        $enumCode .= '    case ' . ($released[$code]?->name ?? $code) . " = '" . $code . "';\n\n";
    }

    $enumCode .= retainedCases($released, array_values($currencies));
    $enumCode .= "}\n";
    return $enumCode;
}

$currencies = parseCSVFile(__DIR__ . '/input/CurrencyCodes.csv');

file_put_contents(ENUM_FILE, "<?php\n\n" . generateEnum($currencies));
