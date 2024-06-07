<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Integration\XRechnung3\CII;

use Easybill\eInvoicing\Specs\XRechnung\CII\Reader;
use Easybill\eInvoicing\Specs\XRechnung\CII\Transformer;

test(
    'Reader parses the provided xml example accordingly and the resulting xml is identical to the provided',
    function (string $pathToXmlExample) {
        $xml = file_get_contents($pathToXmlExample);

        $xml = $this->removeXmlMutates($xml);
        $xml = $this->reformatXml($xml);

        $ciiDocument = Reader::create()->transform($xml);

        $generatedXml = Transformer::create()->transform($ciiDocument);

        $generatedAndFormattedXml = $this->reformatXml($generatedXml);

        $this->assertSame($xml, $generatedAndFormattedXml);

        $this->validateWithKositValidator($generatedAndFormattedXml);
    }
)->with([
    [
        'exampleFile' => __DIR__ . '/Examples/XRECHNUNG_Betriebskostenabrechnung.xml',
    ],
    [
        'exampleFile' => __DIR__ . '/Examples/XRECHNUNG_Einfach.xml',
    ],
    [
        'exampleFile' => __DIR__ . '/Examples/XRECHNUNG_Reisekostenabrechnung.xml',
    ],
]);
