<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\ZUGFeRD;

use easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Reader
{
    public function __construct(private SerializerInterface $serializer) {}

    public function transform(string $xml): ZUGFeRDInvoice
    {
        $value = $this->serializer->deserialize($xml, ZUGFeRDInvoice::class, 'xml');

        if (!$value instanceof ZUGFeRDInvoice) {
            throw new \RuntimeException('value should be instance of ZUGFeRDInvoice');
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
