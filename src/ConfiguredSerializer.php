<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\Handlers\CountryCodeEnumHandler;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class ConfiguredSerializer implements SerializerInterface
{
    private function __construct(
        private SerializerInterface $serializer,
    ) {}

    public static function create(): self
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->configureHandlers(function (HandlerRegistryInterface $registry) {
                $registry->registerSubscribingHandler(new CountryCodeEnumHandler());
            })
            ->build()
        ;
        return new self($serializer);
    }

    public function serialize($data, string $format, ?SerializationContext $context = null, ?string $type = null): string
    {
        return $this->serializer->serialize($data, $format, $context, $type);
    }

    public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null)
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
