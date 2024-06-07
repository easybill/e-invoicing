<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\CII;

use Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Transformer
{
    public function __construct(private SerializerInterface $serializer) {}

    public function transform(XRechnungCiiInvoice $xrechnungCiiInvoice): string
    {
        return $this->serializer->serialize($xrechnungCiiInvoice, 'xml');
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
