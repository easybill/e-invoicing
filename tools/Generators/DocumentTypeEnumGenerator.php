<?php

declare(strict_types=1);

use easybill\eInvoicing\Enums\DocumentType;

require_once __DIR__ . '/EnumSupport.php';

const ENUM_FILE = __DIR__ . '/../../src/Enums/DocumentType.php';

function caseName(string $description, string $code): string
{
    $caseName = strtoupper((string) preg_replace('/[^a-zA-Z0-9]+/', '_', $description));
    $caseName = (string) preg_replace('/^[0-9]+/', '', $caseName); // Entferne führende Zahlen

    return $caseName === '' ? 'CODE_' . $code : $caseName;
}

function generateEnumFromCSV(string $csvContent): string
{
    $lines = array_filter(explode("\n", trim($csvContent)), function ($line) {
        return trim($line) !== '' && !isComment($line);
    });

    $csv = array_map(function ($line) {
        return str_getcsv($line, ';', '"', '');  // Semikolon als Trennzeichen
    }, $lines);

    $lines = [
        'declare(strict_types=1);',
        'namespace easybill\eInvoicing\Enums;',
        "enum DocumentType: int\n{\n",
    ];

    $enumCode = implode("\n\n", $lines);
    $released = releasedCases(ENUM_FILE, DocumentType::class);
    $codes = [];

    foreach ($csv as $row) {
        $code = (string) $row[0];
        $name = (string) $row[1];
        $interpretation = $row[2];
        $codes[] = $code;

        // Names derive from the description, so an edit would otherwise rename a released case.
        $caseName = $released[$code]?->name ?? caseName($name, $code);

        $enumCode .= "    /**\n";
        $enumCode .= "     * Applicable for {$interpretation}.\n";
        $enumCode .= "     */\n";
        $enumCode .= "    case {$caseName} = {$code};\n\n";
    }

    $enumCode .= retainedCases($released, $codes);
    $enumCode .= "}\n";

    return $enumCode;
}

file_put_contents(ENUM_FILE, "<?php\n\n" . generateEnumFromCSV((string) file_get_contents(__DIR__ . '/input/DocumentTypes.csv')));
