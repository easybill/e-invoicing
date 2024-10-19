<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Handlers;

use easybill\eInvoicing\CII\Models\StringValue as CIIStringValue;
use easybill\eInvoicing\UBL\Models\StringValue as UBLStringValue;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

final class StringValueHandler implements SubscribingHandlerInterface
{
    /** @return array<int, array<string, mixed>> */
    public static function getSubscribingMethods(): array
    {
        $methods = [];

        $methods[] = [
            'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
            'format' => 'xml',
            'type' => CIIStringValue::class,
            'method' => 'deserializeString',
        ];

        $methods[] = [
            'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
            'format' => 'xml',
            'type' => CIIStringValue::class,
            'method' => 'serializeString',
        ];

        $methods[] = [
            'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
            'format' => 'xml',
            'type' => UBLStringValue::class,
            'method' => 'deserializeString',
        ];

        $methods[] = [
            'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
            'format' => 'xml',
            'type' => UBLStringValue::class,
            'method' => 'serializeString',
        ];

        return $methods;
    }

    /** @param array<string, mixed> $type */
    public function serializeString(XmlSerializationVisitor $visitor, string $value, array $type): \DOMText
    {
        return $visitor->visitSimpleString($value, $type);
    }

    public function deserializeString(XmlDeserializationVisitor $visitor, \SimpleXMLElement $value): string
    {
        return (string)$value;
    }
}
