<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Validators\Traits;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\Transformer;
use easybill\eInvoicing\UBL\Documents\UblAbstractDocument;
use easybill\eInvoicingTests\Validators\SchemaValidator;

trait AssertXmlOutputTrait
{
    use ReformatXmlTrait;

    public static function buildAndAssertXmlFromCII(CrossIndustryInvoice|UblAbstractDocument $invoice, string $referenceFilePath, string $validatorSchema): void
    {
        $xml = Transformer::create()->transformToXml($invoice);

        self::assertNotEmpty($xml);

        $xml = self::reformatXml($xml);

        $result = (new SchemaValidator())->validateAgainstXsd($xml, $validatorSchema);
        self::assertNull($result, $result ?? '');

        $referenceFile = file_get_contents($referenceFilePath);
        self::assertIsString($referenceFile);
        $referenceFile = self::reformatXml($referenceFile);
        self::assertEquals($referenceFile, $xml);
    }
}
