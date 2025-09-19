<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\Dtos\ReaderResult;
use easybill\eInvoicing\Reader;
use easybill\eInvoicing\UBL\Documents\UblCredit;
use easybill\eInvoicing\UBL\Documents\UblInvoice;
use easybill\eInvoicingTests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class ReaderTest extends TestCase
{
    #[DataProvider('readerDataProvider')]
    public function testReaderCanProcessProvidedXml(string $filePath, \Closure $asserter): void
    {
        $xml = file_get_contents($filePath);

        self::assertNotFalse($xml);

        $reader = Reader::create()->read($xml);

        $asserter($reader);
    }

    /** @return array<string, array{0: string, 1: \Closure}> */
    public static function readerDataProvider(): array
    {
        return [
            'broken xml' => [
                __DIR__ . '/Examples/Reader/Broken.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isError());
                    self::assertInstanceOf(\RuntimeException::class, $readerResult->getError());
                },
            ],
            'invalid format xml' => [
                __DIR__ . '/Examples/Reader/InvalidFormat.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isError());
                    self::assertInstanceOf(\RuntimeException::class, $readerResult->getError());
                    self::assertNotNull($readerResult->getError()->getPrevious());
                    self::assertStringContainsString(
                        'CII or UBL syntax is supported.',
                        $readerResult->getError()->getPrevious()->getMessage()
                    );
                },
            ],
            'peppol invoice' => [
                __DIR__ . '/Examples/Reader/PeppolInvoice.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isSuccess());
                    self::assertInstanceOf(UblInvoice::class, $readerResult->getDocument());
                },
            ],
            'peppol credit' => [
                __DIR__ . '/Examples/Reader/PeppolCredit.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isSuccess());
                    self::assertInstanceOf(UblCredit::class, $readerResult->getDocument());
                },
            ],
            'xrechnung cii' => [
                __DIR__ . '/Examples/Reader/XRechnungCII.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isSuccess());
                    self::assertInstanceOf(CrossIndustryInvoice::class, $readerResult->getDocument());
                },
            ],
            'xrechnung ubl' => [
                __DIR__ . '/Examples/Reader/XRechnungUBL.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isSuccess());
                    self::assertInstanceOf(UblInvoice::class, $readerResult->getDocument());
                },
            ],
            'zugferd' => [
                __DIR__ . '/Examples/Reader/ZUGFeRD.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isSuccess());
                    self::assertInstanceOf(CrossIndustryInvoice::class, $readerResult->getDocument());
                },
            ],
            'ubl invoice invalid id' => [
                __DIR__ . '/Examples/Reader/ublinvoice-invlidID.xml',
                function (ReaderResult $readerResult): void {
                    self::assertTrue($readerResult->isError());
                    self::assertInstanceOf(\RuntimeException::class, $readerResult->getError());
                    self::assertNotNull($readerResult->getError()->getPrevious());
                    self::assertStringContainsString(
                        'CII or UBL syntax is supported.',
                        $readerResult->getError()->getPrevious()->getMessage()
                    );
                },
            ],
        ];
    }
}
