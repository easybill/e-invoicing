<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\Peppol;

use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISAbstractDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Reader
{
    private function __construct(
        private SerializerInterface $serializer,
    ) {}

    /**
     * @template T of PeppolBISAbstractDocument
     * @param class-string<T> $targetClass
     * @return PeppolBISAbstractDocument
     * @throws \RuntimeException
     */
    public function transformXml(string $xml, string $targetClass): mixed
    {
        $object = $this->serializer->deserialize($xml, $targetClass, 'xml');

        if (!$object instanceof $targetClass) {
            throw new \RuntimeException(sprintf('Deserialized object is not an instance of %s', $targetClass));
        }

        return $object;
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
