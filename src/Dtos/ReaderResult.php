<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Dtos;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\UBL\Documents\UblAbstractDocument;

final readonly class ReaderResult
{
    private function __construct(
        private ?\Throwable $throwable = null,
        private CrossIndustryInvoice|UblAbstractDocument|null $document = null,
    ) {}

    public static function error(\Throwable $throwable): self
    {
        return new self(
            throwable: $throwable
        );
    }

    public static function success(CrossIndustryInvoice|UblAbstractDocument $document): self
    {
        return new self(
            throwable: null,
            document: $document,
        );
    }

    public function isError(): bool
    {
        return null !== $this->throwable;
    }

    public function isSuccess(): bool
    {
        return null === $this->throwable;
    }

    /** @throws \LogicException */
    public function getError(): \Throwable
    {
        if (null === $this->throwable || null !== $this->document) {
            throw new \LogicException('the result is successful. Therefore, an error is not available');
        }

        return $this->throwable;
    }

    /** @throws \LogicException */
    public function getDocument(): CrossIndustryInvoice|UblAbstractDocument
    {
        if (null !== $this->throwable || null === $this->document) {
            throw new \LogicException('the result is not successful. Therefore, a document is not available');
        }

        return $this->document;
    }
}
