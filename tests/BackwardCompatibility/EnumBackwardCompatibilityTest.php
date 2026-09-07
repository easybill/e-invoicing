<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\BackwardCompatibility;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class EnumBackwardCompatibilityTest extends TestCase
{
    private const string ENUM_NAMESPACE = 'easybill\eInvoicing\Enums';

    private const string ENUM_DIRECTORY = __DIR__ . '/../../src/Enums';

    private const string SNAPSHOT_DIRECTORY = __DIR__ . '/Snapshots';

    private const string UPDATE_ENV = 'UPDATE_ENUM_SNAPSHOTS';

    #[DataProvider('enumProvider')]
    public function testNoCaseIsEverRemovedOrChanged(string $shortName): void
    {
        $current = self::currentCases($shortName);
        $snapshotFile = self::SNAPSHOT_DIRECTORY . '/' . $shortName . '.txt';

        if (self::isUpdating()) {
            self::writeSnapshot($snapshotFile, $current);
        }

        self::assertFileExists($snapshotFile, sprintf(
            'No snapshot for enum %s. Record it with: composer test:update-enum-snapshots',
            $shortName,
        ));

        $released = self::readSnapshot($snapshotFile);
        $violations = [];

        foreach ($released as $name => $value) {
            if (!array_key_exists($name, $current)) {
                $violations[] = sprintf('case %s = %s is gone', $name, $value);

                continue;
            }

            if ($current[$name] !== $value) {
                $violations[] = sprintf('case %s changed from %s to %s', $name, $value, $current[$name]);
            }
        }

        self::assertSame([], $violations, sprintf(
            "%s is not backwards compatible any more:\n- %s\n\n"
            . 'A case must never be removed, renamed or re-valued. '
            . 'Added cases are recorded with: composer test:update-enum-snapshots',
            $shortName,
            implode("\n- ", $violations),
        ));
    }

    /** @return iterable<string, array{string}> */
    public static function enumProvider(): iterable
    {
        foreach (self::enums() as $shortName) {
            yield $shortName => [$shortName];
        }
    }

    /** @return list<string> */
    private static function enums(): array
    {
        $files = glob(self::ENUM_DIRECTORY . '/*.php');
        self::assertIsArray($files);
        self::assertNotSame([], $files);

        $enums = [];

        foreach ($files as $file) {
            $shortName = basename($file, '.php');

            if (enum_exists(self::ENUM_NAMESPACE . '\\' . $shortName)) {
                $enums[] = $shortName;
            }
        }

        return $enums;
    }

    /** @return array<string, string> backing value as PHP literal, keyed by case name */
    private static function currentCases(string $shortName): array
    {
        $enum = self::ENUM_NAMESPACE . '\\' . $shortName;
        self::assertTrue(enum_exists($enum));
        self::assertTrue(is_subclass_of($enum, \BackedEnum::class), sprintf('Enum %s is not backed.', $shortName));

        /** @var class-string<\BackedEnum> $enum */
        $cases = [];

        foreach ($enum::cases() as $case) {
            $cases[$case->name] = var_export($case->value, true);
        }

        ksort($cases);

        return $cases;
    }

    /** @return array<string, string> */
    private static function readSnapshot(string $snapshotFile): array
    {
        $lines = file($snapshotFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        self::assertIsArray($lines);

        $cases = [];

        foreach ($lines as $line) {
            $parts = explode('=', $line, 2);
            self::assertCount(2, $parts, sprintf('Malformed snapshot line "%s" in %s', $line, $snapshotFile));

            $cases[$parts[0]] = $parts[1];
        }

        return $cases;
    }

    /**
     * Merging instead of overwriting keeps an update from silently blessing a
     * removal - an intentional removal has to be edited into the snapshot by hand.
     *
     * @param array<string, string> $current
     */
    private static function writeSnapshot(string $snapshotFile, array $current): void
    {
        if (!is_dir(self::SNAPSHOT_DIRECTORY)) {
            mkdir(self::SNAPSHOT_DIRECTORY, 0o755, true);
        }

        $cases = is_file($snapshotFile) ? self::readSnapshot($snapshotFile) + $current : $current;
        ksort($cases);

        $lines = '';

        foreach ($cases as $name => $value) {
            $lines .= $name . '=' . $value . "\n";
        }

        file_put_contents($snapshotFile, $lines);
    }

    private static function isUpdating(): bool
    {
        return in_array(getenv(self::UPDATE_ENV), ['1', 'true'], true);
    }
}
