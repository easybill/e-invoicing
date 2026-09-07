<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\ElectronicAddressScheme;

const ENUM_FILE = __DIR__ . '/../../src/Enums/ElectronicAddressScheme.php';

// Load the current enum so already released case names can be looked up below.
require ENUM_FILE;

/** @return array<string, string> */
function parseCSVFile(string $filename): array
{
    $countries = [];
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ';', '"', '')) !== false) {
            if (count($data) >= 2) {
                $countries[trim($data[0])] = trim($data[1]);
            }
        }
        fclose($handle);
    }
    return $countries;
}

/** Turns a code list description into a valid PHP enum case name. */
function caseName(string $description): string
{
    $case = strtoupper((string) preg_replace('/[^a-zA-Z0-9]+/', '_', $description));

    return rtrim(substr(trim($case, '_'), 0, 64), '_');
}

/** @param array<string, string> $values description of each code, keyed by code */
function generateEnum(array $values): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum ElectronicAddressScheme: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);

    foreach ($values as $code => $description) {
        $code = (string) $code; // numeric codes become int array keys

        // The enum has been hand-edited since 0.2.0, so its case names cannot be
        // re-derived from the code list. Renaming one would break BC, therefore a
        // known code keeps its name and only a new code gets a generated one.
        $name = ElectronicAddressScheme::tryFrom($code)?->name ?? caseName($description);

        $enumCode .= sprintf("    case %s = '%s';\n", $name, $code);
    }

    $enumCode .= "}\n";
    return $enumCode;
}

$enumCode = generateEnum(parseCSVFile(__DIR__ . '/Input/ElectronicAddressSchemeCodes.csv'));

file_put_contents(ENUM_FILE, "<?php\n\n" . $enumCode);
