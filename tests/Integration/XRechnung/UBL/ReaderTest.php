<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Integration\XRechnung3\UBL;

use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblInvoice;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Reader;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Transformer;

test(
    'Reader parses the provided xml example accordingly and the resulting xml is identical to the provided',
    function (string $ublDocumentClass, string $pathToXmlExample) {
        $xml = file_get_contents($pathToXmlExample);

        $xml = $this->removeXmlMutates($xml);
        $xml = $this->reformatXml($xml);

        $ublDocument = Reader::create()->transformXmlToUblDocument($xml, $ublDocumentClass);

        $generatedXml = Transformer::create()->transformUblDocumentToXml($ublDocument);

        $generatedAndFormattedXml = $this->reformatXml($generatedXml);

        $this->assertSame($xml, $generatedAndFormattedXml);

        $this->validateWithKositValidator($generatedAndFormattedXml);
    }
)->with([
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.01a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.02a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.03a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.04a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.05a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.06a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.07a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.08a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.09a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.10a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.11a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.12a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.13a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.14a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.15a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.17a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.18a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.19a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.20a-INVOICE_ubl.xml',
    ],
    [
        'ublDocumentClass' => XRechnungUblInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/01.21a-INVOICE_ubl.xml',
    ],
]);
