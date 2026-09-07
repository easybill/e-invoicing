<?php

declare(strict_types=1);

/**
 * @return array<string, string>
 */
function parseCSVFile(string $filename): array
{
    $rows = [];

    if (($handle = fopen($filename, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ';', '"', '')) !== false) {
            if (count($data) >= 2 && !isComment($data[0])) {
                $rows[trim($data[0])] = trim($data[1]);
            }
        }
        fclose($handle);
    }

    return $rows;
}

function isComment(?string $field): bool
{
    return str_starts_with(ltrim((string) $field), '#');
}

/**
 * @param class-string<BackedEnum> $enum
 *
 * @return array<string, BackedEnum> cases of the enum on disk, keyed by backing value
 */
function releasedCases(string $enumFile, string $enum): array
{
    if (!is_file($enumFile)) {
        return [];
    }

    require_once $enumFile;

    $cases = [];

    foreach ($enum::cases() as $case) {
        $cases[(string) $case->value] = $case;
    }

    return $cases;
}

/**
 * @param array<string, BackedEnum> $released     cases keyed by backing value
 * @param list<string>              $currentCodes codes the code list still contains
 */
function retainedCases(array $released, array $currentCodes): string
{
    $enumCode = '';

    foreach ($released as $value => $case) {
        if (in_array((string) $value, $currentCodes, true)) { // numeric codes become int array keys
            continue;
        }

        $enumCode .= sprintf("    case %s = %s;\n\n", $case->name, var_export($case->value, true));
    }

    return $enumCode;
}

/**
 * @param array<array-key, mixed> $codeList
 *
 * @return list<string> codes as strings, so they can be compared to backing values
 */
function codesOf(array $codeList): array
{
    return array_map('strval', array_keys($codeList));
}
