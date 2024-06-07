<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Integration;

use Easybill\eInvoicing\DocumentXmlReader;
use Easybill\eInvoicing\Dtos\ReaderResult;
use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISCredit;
use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISInvoice;
use Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblInvoice;
use Easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;

test(
    'test if the reader can process the provided xml',
    function (string $exampleFilePath, callable $asserter) {
        $xml = file_get_contents($exampleFilePath);

        $reader = DocumentXmlReader::create()->read($xml);

        $asserter($reader);
    },
)->with([
    [
        'example' => __DIR__ . '/Examples/Reader/Broken.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isError())
                ->toBeTrue()
                ->and($readerResult->getError())
                ->toBeInstanceOf(\RuntimeException::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/InvalidFormat.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isError())
                ->toBeTrue()
                ->and($readerResult->getError())
                ->toBeInstanceOf(\RuntimeException::class)
                ->and($readerResult->getError()->getPrevious())
                ->not()
                ->toBeNull()
                ->and($readerResult->getError()->getPrevious()->getMessage())
                ->toContain('CII or UBL syntax is supported.')
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/PeppolInvoice.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(PeppolBISInvoice::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/PeppolCredit.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(PeppolBISCredit::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/XRechnungCII.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(XRechnungCiiInvoice::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/XRechnungUBL.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(XRechnungUblInvoice::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/ZUGFeRD.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(ZUGFeRDInvoice::class)
            ;
        },
    ],
]);
