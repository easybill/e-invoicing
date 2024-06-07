<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\Peppol;

use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISAbstractDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Transformer
{
    private function __construct(
        private SerializerInterface $serializer,
    ) {}

    public function transformPeppolDocumentToXml(PeppolBISAbstractDocument $peppolBISAbstractDocument): string
    {
        return $this->serializer->serialize($peppolBISAbstractDocument, 'xml');
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
