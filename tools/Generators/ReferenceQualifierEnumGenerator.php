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

/** @param array<string, string> $references */
function generateEnum(array $references): string
{
    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum ReferenceQualifier: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    foreach ($references as $code => $name) {
        $enumCode .= '    // ' . $name . "\n";
        $enumCode .= '    case ' . $code . " = '" . $code . "';\n\n";
    }
    $enumCode .= "}\n";
    return $enumCode;
}

$csvFilePath = __DIR__ . '/input/ReferenceQualifier.csv';

$countries = parseCSVFile($csvFilePath);

$enumCode = generateEnum($countries);

file_put_contents(__DIR__ . '/../../src/Enums/ReferenceQualifier.php', "<?php\n\n" . $enumCode);