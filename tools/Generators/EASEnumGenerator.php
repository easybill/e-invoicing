<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\ElectronicAddressScheme;

require_once __DIR__ . '/EnumSupport.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/ElectronicAddressScheme.php';

function caseName(string $description): string
{
    $case = strtoupper((string) preg_replace('/[^a-zA-Z0-9]+/', '_', $description));

    return rtrim(substr(trim($case, '_'), 0, 64), '_');
}

/** @param array<string, string> $values description keyed by code */
function generateEnum(array $values): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum ElectronicAddressScheme: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    $released = releasedCases(ENUM_FILE, ElectronicAddressScheme::class);

    foreach ($values as $code => $description) {
        $code = (string) $code; // numeric codes become int array keys

        // Hand-edited since 0.2.0, so a released name cannot be re-derived from
        // the code list - only a new code gets a generated one.
        $name = $released[$code]?->name ?? caseName($description);

        $enumCode .= sprintf("    case %s = '%s';\n", $name, $code);
    }

    $enumCode .= retainedCases($released, codesOf($values));
    $enumCode .= "}\n";
    return $enumCode;
}

$values = parseCSVFile(__DIR__ . '/Input/ElectronicAddressSchemeCodes.csv');

file_put_contents(ENUM_FILE, "<?php\n\n" . generateEnum($values));
