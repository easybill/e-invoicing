<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\Handlers\CountryCodeEnumHandler;
use easybill\eInvoicing\Handlers\CurrencyCodeEnumHandler;
use easybill\eInvoicing\Handlers\DocumentTypeEnumHandler;
use easybill\eInvoicing\Handlers\ElectronicAddressSchemeIdentifierEnumHandler;
use easybill\eInvoicing\Handlers\MimeTypeEnumHandler;
use easybill\eInvoicing\Handlers\ReferenceQualifierEnumHandler;
use easybill\eInvoicing\Handlers\StringValueHandler;
use easybill\eInvoicing\Handlers\UnitCodeEnumHandler;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
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
                $registry->registerSubscribingHandler(new StringValueHandler());
                $registry->registerSubscribingHandler(new CountryCodeEnumHandler());
                $registry->registerSubscribingHandler(new CurrencyCodeEnumHandler());
                $registry->registerSubscribingHandler(new DocumentTypeEnumHandler());
                $registry->registerSubscribingHandler(new ReferenceQualifierEnumHandler());
                $registry->registerSubscribingHandler(new UnitCodeEnumHandler());
                $registry->registerSubscribingHandler(new MimeTypeEnumHandler());
                $registry->registerSubscribingHandler(new ElectronicAddressSchemeIdentifierEnumHandler());
            })
            ->build()
        ;
        return new self($serializer);
    }

    /** @param array<SubscribingHandlerInterface> $handlers */
    public static function createWithHandlers(array $handlers): self
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->configureHandlers(function (HandlerRegistryInterface $registry) use ($handlers) {
                foreach ($handlers as $handler) {
                    $registry->registerSubscribingHandler($handler);
                }
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
