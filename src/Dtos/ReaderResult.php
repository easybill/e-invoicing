<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Dtos;

use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISAbstractDocument;
use Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblAbstractDocument;
use Easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;

final class ReaderResult
{
    private function __construct(
        public ?\Throwable $throwable = null,
        public null|PeppolBISAbstractDocument|XRechnungCiiInvoice|XRechnungUblAbstractDocument|ZUGFeRDInvoice $document = null,
    ) {}

    public static function error(\Throwable $throwable): self
    {
        return new self(
            throwable: $throwable
        );
    }

    public static function success(PeppolBISAbstractDocument|XRechnungCiiInvoice|XRechnungUblAbstractDocument|ZUGFeRDInvoice $document): self
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

    public function getError(): \Throwable
    {
        if (null === $this->throwable || null !== $this->document) {
            throw new \LogicException('the result is successful. Therefore, an error is not available');
        }

        return $this->throwable;
    }

    public function getDocument(): PeppolBISAbstractDocument|XRechnungCiiInvoice|XRechnungUblAbstractDocument|ZUGFeRDInvoice
    {
        if (null !== $this->throwable || null === $this->document) {
            throw new \LogicException('the result is not successful. Therefore, a document is not available');
        }

        return $this->document;
    }
}
