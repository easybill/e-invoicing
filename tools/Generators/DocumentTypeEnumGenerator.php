<?php

declare(strict_types=1);

function generateEnumFromCSV(string $csvContent): string
{
    $csv = array_map(function ($line) {
        return str_getcsv($line, ';');  // Semikolon als Trennzeichen
    }, explode("\n", $csvContent));

    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum DocumentType: int\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);

    foreach ($csv as $row) {
        $code = $row[0];
        $name = $row[1];
        $interpretation = $row[2];

        $caseName = strtoupper((string)preg_replace('/[^a-zA-Z0-9]+/', '_', (string)$name));
        $caseName = preg_replace('/^[0-9]+/', '', $caseName); // Entferne führende Zahlen
        if (empty($caseName)) {
            $caseName = 'CODE_' . $code; // Fallback, falls der Name keine gültigen Zeichen enthält
        }

        $enumCode .= "    /**\n";
        $enumCode .= "     * Applicable for {$interpretation}\n";
        $enumCode .= "     */\n";
        $enumCode .= "    case {$caseName} = {$code};\n\n";
    }

    $enumCode .= "}\n";

    return $enumCode;
}

$csvFilePath = __DIR__ . '/input/DocumentTypes.csv';

$generatedEnum = generateEnumFromCSV((string)file_get_contents($csvFilePath));

file_put_contents(__DIR__ . '/../../src/Enums/DocumentType.php', "<?php\n\n" . $generatedEnum);
