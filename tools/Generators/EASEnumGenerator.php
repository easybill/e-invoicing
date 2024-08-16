<?php

declare(strict_types=1);

/** @return array<string, string> */
function parseCSVFile(string $filename): array
{
    $countries = [];
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ';')) !== false) {
            if (count($data) >= 2) {
                $countries[trim($data[0])] = trim($data[1]);
            }
        }
        fclose($handle);
    }
    return $countries;
}

/** @param array<string, string> $values */
function generateEnum(array $values): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum ElectronicAddressSchemeIdentifier: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    foreach ($values as $code => $name) {
        // Generate a valid PHP identifier for the case
        $case = preg_replace('/[^a-zA-Z0-9]+/', '_', $name);
        $case = strtoupper((string)$case);
        $case = rtrim($case, '_');

        // Ensure the case name starts with a letter
        if (!ctype_alpha((string)$code)) {
            $case = 'ICD_' . $case;
        }

        // Truncate case name if it's too long
        if (strlen($case) > 64) {
            $case = substr($case, 0, 64);
        }

        // Remove duplicate underscores
        $case = preg_replace('/_+/', '_', $case);

        $enumCode .= "    case {$case} = '{$code}';\n";
    }
    $enumCode .= "}\n";
    return $enumCode;
}

$csvFilePath = __DIR__ . '/Input/ElectronicAddressSchemeCodes.csv';

$countries = parseCSVFile($csvFilePath);

$enumCode = generateEnum($countries);

file_put_contents(__DIR__ . '/../../src/Enums/ElectronicAddressSchemeIdentifier.php', "<?php\n\n" . $enumCode);
