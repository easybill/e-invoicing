<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\Dtos\ReaderResult;
use easybill\eInvoicing\Reader;
use easybill\eInvoicing\UBL\Documents\UblCredit;
use easybill\eInvoicing\UBL\Documents\UblInvoice;

test(
    'test if the reader can process the provided xml',
    function (string $exampleFilePath, callable $asserter) {
        $xml = file_get_contents($exampleFilePath);

        expect($xml)->not->toBeFalse();

        $reader = Reader::create()->read($xml);

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
                ->toBeInstanceOf(UblInvoice::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/PeppolCredit.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(UblCredit::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/XRechnungCII.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(CrossIndustryInvoice::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/XRechnungUBL.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(UblInvoice::class)
            ;
        },
    ],
    [
        'example' => __DIR__ . '/Examples/Reader/ZUGFeRD.xml',
        'asserter' => function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(CrossIndustryInvoice::class)
            ;
        },
    ],
]);
