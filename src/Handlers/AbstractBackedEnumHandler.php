<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

abstract class AbstractBackedEnumHandler implements SubscribingHandlerInterface
{
    /** @return class-string<\BackedEnum> */
    public static function getEnumClass(): string
    {
        throw new \RuntimeException('not yet implemented');
    }

    /** @return array<int, array<string, mixed>> */
    public static function getSubscribingMethods(): array
    {
        $methods = [];

        $methods[] = [
            'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
            'format' => 'xml',
            'type' => static::getEnumClass(),
            'method' => 'deserializeEnum',
        ];

        $methods[] = [
            'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
            'format' => 'xml',
            'type' => static::getEnumClass(),
            'method' => 'serializeEnum',
        ];

        return $methods;
    }

    /** @param array<string, mixed> $type */
    public function serializeEnum(XmlSerializationVisitor $visitor, \BackedEnum $enum, array $type): \DOMText
    {
        return $visitor->visitSimpleString($enum->value, $type);
    }

    public function deserializeEnum(XmlDeserializationVisitor $visitor, \SimpleXMLElement $data): \BackedEnum
    {
        $class = static::getEnumClass();

        $rEnum = new \ReflectionEnum($class);

        $rBackingType = $rEnum->getBackingType();

        return match ((string)$rBackingType) {
            'string' => $class::from((string)$data),
            'int' => $class::from((int)$data),
            default => throw new \BadMethodCallException('Unknown backing type'),
        };
    }
}
