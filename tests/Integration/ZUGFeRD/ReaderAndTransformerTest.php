<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration\ZUGFeRD;

use easybill\eInvoicing\Specs\ZUGFeRD\Reader;
use easybill\eInvoicing\Specs\ZUGFeRD\Transformer;

test(
    'building and reading different xml formats',
    function (string $filename) {
        $xml = file_get_contents(__DIR__ . '/Examples/' . $filename);

        $obj = Reader::create()->transform($xml);
        $str = Transformer::create()->transform($obj);

        $this->assertSame(
            $this->reformatXml($xml),
            $this->reformatXml($str),
        );
    }
)->with([
    'BASIC WL/BASIC-WL_Einfach.xml',
    'EN16931/EN16931_Einfach.xml',
]);
