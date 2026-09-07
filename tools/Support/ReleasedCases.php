<?php

declare(strict_types=1);

namespace easybill\eInvoicingTools;

use BackedEnum;

final class ReleasedCases
{
    /** @var array<string, string> */
    private array $namesByValue = [];

    /** @param list<BackedEnum> $cases */
    private function __construct(private readonly array $cases)
    {
        foreach ($cases as $case) {
            $this->namesByValue[(string) $case->value] = $case->name;
        }
    }

    /** @param class-string<BackedEnum> $enum */
    public static function load(string $enumFile, string $enum): self
    {
        if (!is_file($enumFile)) {
            return new self([]);
        }

        require_once $enumFile;

        return new self($enum::cases());
    }

    public function nameFor(string $value): ?string
    {
        return $this->namesByValue[$value] ?? null;
    }

    /**
     * @param list<string> $currentCodes
     *
     * @return list<BackedEnum>
     */
    public function retained(array $currentCodes): array
    {
        return array_values(array_filter(
            $this->cases,
            static fn (BackedEnum $case): bool => !in_array((string) $case->value, $currentCodes, true),
        ));
    }
}
