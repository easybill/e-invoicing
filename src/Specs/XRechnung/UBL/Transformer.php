<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\UBL;

use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblAbstractDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Transformer
{
    private function __construct(
        private SerializerInterface $serializer,
    ) {}

    public function transformUblDocumentToXml(XRechnungUblAbstractDocument $UBLDocument): string
    {
        return $this->serializer->serialize($UBLDocument, 'xml');
    }

    public static function create(): Transformer
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->build()
        ;
        return new self($serializer);
    }
}
