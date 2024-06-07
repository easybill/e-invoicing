<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Integration\Peppol;

use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISCredit;
use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISInvoice;
use Easybill\eInvoicing\Specs\Peppol\Reader;
use Easybill\eInvoicing\Specs\Peppol\Transformer;

test(
    'Reader parses the provided xml example accordingly and the resulting xml is identical to the provided',
    function (string $documentClass, string $pathToXmlExample) {
        $xml = file_get_contents($pathToXmlExample);

        $xml = $this->removeXmlMutates($xml);
        $xml = $this->reformatXml($xml);

        $peppolDocument = Reader::create()->transformXml($xml, $documentClass);

        $generatedXml = Transformer::create()->transformPeppolDocumentToXml($peppolDocument);

        $generatedAndFormattedXml = $this->reformatXml($generatedXml);

        $this->assertSame($xml, $generatedAndFormattedXml);
    }
)->with([
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/Allowance-example.xml',
    ],
    [
        'documentClass' => PeppolBISCredit::class,
        'exampleFile' => __DIR__ . '/Examples/base-creditnote-correction.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/base-example.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/base-negative-inv-correction.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/sales-order-example.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/vat-category-E.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/vat-category-O.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/Vat-category-S.xml',
    ],
    [
        'documentClass' => PeppolBISInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/vat-category-Z.xml',
    ],
]);
