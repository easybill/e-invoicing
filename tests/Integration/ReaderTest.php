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
    function (string $filePath, callable $asserter) {
        $xml = file_get_contents($filePath);

        expect($xml)->not->toBeFalse();

        $reader = Reader::create()->read($xml);

        $asserter($reader);
    },
)->with([
    [
        __DIR__ . '/Examples/Reader/Broken.xml',
        function (ReaderResult $readerResult) {
            expect($readerResult->isError())
                ->toBeTrue()
                ->and($readerResult->getError())
                ->toBeInstanceOf(\RuntimeException::class)
            ;
        },
    ],
    [
        __DIR__ . '/Examples/Reader/InvalidFormat.xml',
        function (ReaderResult $readerResult) {
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
        __DIR__ . '/Examples/Reader/PeppolInvoice.xml',
        function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(UblInvoice::class)
            ;
        },
    ],
    [
        __DIR__ . '/Examples/Reader/PeppolCredit.xml',
        function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(UblCredit::class)
            ;
        },
    ],
    [
        __DIR__ . '/Examples/Reader/XRechnungCII.xml',
        function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(CrossIndustryInvoice::class)
            ;
        },
    ],
    [
        __DIR__ . '/Examples/Reader/XRechnungUBL.xml',
        function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(UblInvoice::class)
            ;
        },
    ],
    [
        __DIR__ . '/Examples/Reader/ZUGFeRD.xml',
        function (ReaderResult $readerResult) {
            expect($readerResult->isSuccess())
                ->toBeTrue()
                ->and($readerResult->getDocument())
                ->toBeInstanceOf(CrossIndustryInvoice::class)
            ;
        },
    ],
    [
        __DIR__ . '/Examples/Reader/ublinvoice-invlidID.xml',
        function (ReaderResult $readerResult) {
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
]);
