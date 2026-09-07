<?php

declare(strict_types=1);

namespace easybill\eInvoicingTools;

use BackedEnum;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\Printer;

final class EnumFileWriter
{
    /** @var list<array{string, string|int, string|null}> */
    private array $cases = [];

    private function __construct(
        private readonly string $namespace,
        private readonly string $shortName,
        private readonly string $backingType,
        private readonly string $file,
    ) {}

    /**
     * @param class-string<BackedEnum> $enum
     * @param 'int'|'string'           $backingType
     */
    public static function for(string $enum, string $backingType, string $file): self
    {
        $separator = strrpos($enum, '\\');

        return new self(
            $separator === false ? '' : substr($enum, 0, $separator),
            $separator === false ? $enum : substr($enum, $separator + 1),
            $backingType,
            $file,
        );
    }

    public function addCase(string $name, string|int $value, ?string $comment = null): self
    {
        $this->cases[] = [$name, $value, $comment];

        return $this;
    }

    public function write(): void
    {
        $file = new PhpFile();
        $file->setStrictTypes();

        $enum = $file->addNamespace($this->namespace)->addEnum($this->shortName);
        $enum->setType($this->backingType);

        foreach ($this->cases as [$name, $value, $comment]) {
            $case = $enum->addCase($name, $value);

            if ($comment !== null) {
                $case->addComment($comment);
            }
        }

        $printer = new Printer();
        $printer->indentation = '    ';

        file_put_contents($this->file, $printer->printFile($file));
    }
}
