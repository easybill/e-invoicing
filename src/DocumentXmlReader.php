<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\Dtos\ReaderResult;
use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISCredit;
use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISInvoice;
use easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblCredit;
use easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblInvoice;
use easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final class DocumentXmlReader
{
    public function __construct(private SerializerInterface $serializer) {}

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

    public static function create(): DocumentXmlReader
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->build()
        ;
        return new self($serializer);
    }

    private function tryDeserializingCIIDocument(\DOMDocument $document): ReaderResult
    {
        $xml = $document->saveXML();

        if (false === $xml) {
            throw new \RuntimeException('saving of the xml data failed');
        }

        if ($this->isXRechnungCII($document)) {
            $document = $this->serializer->deserialize($xml, XRechnungCiiInvoice::class, 'xml');

            if (!$document instanceof XRechnungCiiInvoice) {
                throw new \RuntimeException('could not deserialize XRechnungCiiInvoice');
            }

            return ReaderResult::success($document);
        }

        if ($this->isZUGFeRD($document)) {
            $document = $this->serializer->deserialize($xml, ZUGFeRDInvoice::class, 'xml');

            if (!$document instanceof ZUGFeRDInvoice) {
                throw new \RuntimeException('could not deserialize ZUGFeRDInvoice');
            }

            return ReaderResult::success($document);
        }

        throw new \RuntimeException('the provided xml seems to be CII syntax but not a spec which is currently supported.');
    }

    private function tryDeserializingUBLDocument(\DOMDocument $document): ReaderResult
    {
        $xml = $document->saveXML();

        if (false === $xml) {
            throw new \RuntimeException('saving of the xml data failed');
        }

        if ($this->isXRechnungUbl($document)) {
            if ($this->isUBLInvoice($document)) {
                $document = $this->serializer->deserialize($xml, XRechnungUblInvoice::class, 'xml');

                if (!$document instanceof XRechnungUblInvoice) {
                    throw new \RuntimeException('could not deserialize XRechnungUblInvoice');
                }

                return ReaderResult::success($document);
            }

            if ($this->isUBLCredit($document)) {
                $document = $this->serializer->deserialize($xml, XRechnungUblCredit::class, 'xml');

                if (!$document instanceof XRechnungUblInvoice) {
                    throw new \RuntimeException('could not deserialize XRechnungUblCredit');
                }

                return ReaderResult::success($document);
            }

            throw new \RuntimeException('The customization id of the provided xml is seems to be XRechnung. However, the root element seems to be neither CreditNote or Invoice');
        }

        if ($this->isPeppol($document)) {
            if ($this->isUBLInvoice($document)) {
                $document = $this->serializer->deserialize($xml, PeppolBISInvoice::class, 'xml');

                if (!$document instanceof PeppolBISInvoice) {
                    throw new \RuntimeException('could not deserialize PeppolBISInvoice');
                }

                return ReaderResult::success($document);
            }

            if ($this->isUBLCredit($document)) {
                $document = $this->serializer->deserialize($xml, PeppolBISCredit::class, 'xml');

                if (!$document instanceof PeppolBISCredit) {
                    throw new \RuntimeException('could not deserialize PeppolBISCredit');
                }

                return ReaderResult::success($document);
            }

            throw new \RuntimeException('The customization id of the provided xml seems to be Peppol BIX. However, the root element seems to be neither CreditNote or Invoice');
        }

        throw new \RuntimeException('the provided xml seems to be UBL syntax but not a spec which is currently supported.');
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

    private function isXRechnungUbl(\DOMDocument $document): bool
    {
        $result = $document->getElementsByTagName('CustomizationID')->item(0)?->nodeValue;

        if (null === $result) {
            return false;
        }

        return str_contains($result, 'kosit:xrechnung_3.0');
    }

    private function isXRechnungCII(\DOMDocument $document): bool
    {
        $result = $document->getElementsByTagName('GuidelineSpecifiedDocumentContextParameter')->item(0)?->nodeValue;

        if (null === $result) {
            return false;
        }

        return str_contains($result, 'xeinkauf.de:kosit:xrechnung_3.0');
    }

    private function isPeppol(\DOMDocument $document): bool
    {
        $result = $document->getElementsByTagName('CustomizationID')->item(0)?->nodeValue;

        if (null === $result) {
            return false;
        }

        return str_contains($result, 'peppol.eu:2017:poacc:billing:3.0');
    }

    private function isZUGFeRD(\DOMDocument $document): bool
    {
        $result = $document->getElementsByTagName('GuidelineSpecifiedDocumentContextParameter')->item(0)?->nodeValue;

        if (null === $result) {
            return false;
        }

        $profiles = [
            'urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic',
            'urn:factur-x.eu:1p0:basicwl',
            'urn:factur-x.eu:1p0:minimum',
            'urn:cen.eu:en16931:2017',
            'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended',
        ];

        return in_array($result, $profiles, true);
    }
}
