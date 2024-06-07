<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\CII;

use easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Reader
{
    public function __construct(private SerializerInterface $serializer) {}

    public function transform(string $xml): XRechnungCiiInvoice
    {
        $value = $this->serializer->deserialize($xml, XRechnungCiiInvoice::class, 'xml');

        if (!$value instanceof XRechnungCiiInvoice) {
            throw new \RuntimeException('value should be instance of XRechnungCiiInvoice');
        }

        return $value;
    }

    public static function create(): Reader
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->build()
        ;
        return new self($serializer);
    }
}
