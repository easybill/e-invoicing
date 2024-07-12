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
        "enum UnitCode: string\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    foreach ($references as $code => $name) {
        if (is_numeric(substr((string)$code, 0, 1))) {
            $codeName = '_' . $code;
        } else {
            $codeName = $code;
        }

        $enumCode .= '    // ' . $name . "\n";
        $enumCode .= '    case ' . $codeName . " = '" . $code . "';\n\n";
    }
    $enumCode .= "}\n";
    return $enumCode;
}

$csvFilePath = __DIR__ . '/input/UnitCodes.csv';

$countries = parseCSVFile($csvFilePath);

$enumCode = generateEnum($countries);

file_put_contents(__DIR__ . '/../../src/Enums/UnitCode.php', "<?php\n\n" . $enumCode);
