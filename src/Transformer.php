<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\UBL\Documents\UblAbstractDocument;
use JMS\Serializer\SerializerInterface;

final readonly class Transformer
{
    private function __construct(
        private SerializerInterface $serializer,
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
