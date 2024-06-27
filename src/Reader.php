<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\Dtos\ReaderResult;
use easybill\eInvoicing\UBL\Documents\UblCredit;
use easybill\eInvoicing\UBL\Documents\UblInvoice;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Reader
{
    public function __construct(private ConfiguredSerializer $serializer) {}

    public function read(string $xml): ReaderResult
    {
        try {
            $xml = preg_replace('/<!--(.|\s)*?-->/', '', $xml);

            $doc = new \DOMDocument();
            $doc->preserveWhiteSpace = false;
            $doc->formatOutput = true;

            if (null === $xml) {
                throw new \InvalidArgumentException('Provided xml is null and therefore it cannot be read');
            }

            $doc->loadXML($xml);

            $this->assertIsContainsSupportedSyntax($doc);

            if ($this->isCII($doc)) {
                return $this->tryDeserializingCIIDocument($doc);
            }

            return $this->tryDeserializingUBLDocument($doc);
        } catch (\ValueError $valueError) {
            return ReaderResult::error(
                new \RuntimeException('could not read XML', previous: $valueError),
            );
        } catch (\RuntimeException $runtimeException) {
            return ReaderResult::error(
                new \RuntimeException('could not process XML', previous: $runtimeException),
            );
        }
    }

    public static function create(): Reader
    {
        return new self(ConfiguredSerializer::create());
    }

    private function tryDeserializingCIIDocument(\DOMDocument $document): ReaderResult
    {
        $xml = $document->saveXML();

        if (false === $xml) {
            throw new \RuntimeException('saving of the xml data failed');
        }

        $document = $this->serializer->deserialize($xml, CrossIndustryInvoice::class, 'xml');

        if (!$document instanceof CrossIndustryInvoice) {
            throw new \RuntimeException('could not deserialize CrossIndustryInvoice');
        }

        return ReaderResult::success($document);
    }

    private function tryDeserializingUBLDocument(\DOMDocument $document): ReaderResult
    {
        $xml = $document->saveXML();

        if (false === $xml) {
            throw new \RuntimeException('saving of the xml data failed');
        }

        if ($this->isUBLInvoice($document)) {
            $document = $this->serializer->deserialize($xml, UblInvoice::class, 'xml');

            if (!$document instanceof UblInvoice) {
                throw new \RuntimeException('could not deserialize XRechnungUblInvoice');
            }

            return ReaderResult::success($document);
        }

        if ($this->isUBLCredit($document)) {
            $document = $this->serializer->deserialize($xml, UblCredit::class, 'xml');

            if (!$document instanceof UblCredit) {
                throw new \RuntimeException('could not deserialize XRechnungUblCredit');
            }

            return ReaderResult::success($document);
        }

        throw new \RuntimeException('the provided xml syntax seems to be invalid. Only INVOICE and CREDIT is supported in UBL context');
    }

    /** @throws \RuntimeException */
    private function assertIsContainsSupportedSyntax(\DOMDocument $document): void
    {
        if (!$this->isCII($document) && !$this->isUBLInvoice($document) && !$this->isUBLCredit($document)) {
            throw new \RuntimeException('syntax of the provided element is not supported. CII or UBL syntax is supported.');
        }
    }

    private function isCII(\DOMDocument $document): bool
    {
        $supportedElements = [
            'CrossIndustryInvoice',
            'rsm:CrossIndustryInvoice',
        ];

        $node = $document->childNodes->item(0);

        if (null === $node) {
            return false;
        }

        // We check if the root element of the xml document is one of the supported types
        return in_array($node->nodeName, $supportedElements, true);
    }

    private function isUBLInvoice(\DOMDocument $document): bool
    {
        $supportedElements = [
            'Invoice',
            'ubl:Invoice',
        ];

        $node = $document->childNodes->item(0);

        if (null === $node) {
            return false;
        }

        // We check if the root element of the xml document is one of the supported types
        return in_array($node->nodeName, $supportedElements, true);
    }

    private function isUBLCredit(\DOMDocument $document): bool
    {
        $supportedElements = [
            'CreditNote',
            'ubl:CreditNote',
        ];

        $node = $document->childNodes->item(0);

        if (null === $node) {
            return false;
        }

        // We check if the root element of the xml document is one of the supported types
        return in_array($node->nodeName, $supportedElements, true);
    }
}
