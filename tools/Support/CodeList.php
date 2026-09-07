<?php

declare(strict_types=1);

namespace easybill\eInvoicingTools;

final class CodeList
{
    /** @return list<list<string>> */
    public static function rows(string $file): array
    {
        $handle = fopen($file, 'r');

        if ($handle === false) {
            return [];
        }

        $rows = [];

        while (($data = fgetcsv($handle, 1000, ';', '"', '')) !== false) {
            if (count($data) >= 2 && !self::isComment($data[0])) {
                $rows[] = array_map(static fn (?string $field): string => trim((string) $field), $data);
            }
        }

        fclose($handle);

        return $rows;
    }

    private static function isComment(?string $field): bool
    {
        return str_starts_with(ltrim((string) $field), '#');
    }
}
