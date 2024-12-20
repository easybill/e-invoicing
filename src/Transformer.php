<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\UBL\Documents\UblAbstractDocument;

final readonly class Transformer
{
    public function __construct(
        private ConfiguredSerializer $serializer,
    ) {}

    public function transformToXml(CrossIndustryInvoice|UblAbstractDocument $document): string
    {
        return $this->serializer->serialize($document, 'xml');
    }

    public static function create(): self
    {
        return new self(ConfiguredSerializer::create());
    }
}
