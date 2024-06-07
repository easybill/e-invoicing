<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Validators\Traits;

use Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use Easybill\eInvoicing\Specs\XRechnung\CII\Transformer as XRechnungTransformer;
use Easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use Easybill\eInvoicing\Specs\ZUGFeRD\Transformer as ZUGFeRDTransformer;
use Easybill\eInvoicingTests\Validators\SchemaValidator;

trait AssertXmlOutputTrait
{
    use ReformatXmlTrait;

    public static function buildAndAssertXmlFromCII(XRechnungCiiInvoice|ZUGFeRDInvoice $invoice, string $referenceFilePath, string $validatorSchema): void
    {
        if ($invoice instanceof XRechnungCiiInvoice) {
            $xml = XRechnungTransformer::create()->transform($invoice);
        } else {
            $xml = ZUGFeRDTransformer::create()->transform($invoice);
        }

        self::assertNotEmpty($xml);

        $xml = self::reformatXml($xml);

        $result = (new SchemaValidator())->validateAgainstXsd($xml, $validatorSchema);
        self::assertNull($result, $result ?? '');

        $referenceFile = file_get_contents($referenceFilePath);
        $referenceFile = self::reformatXml($referenceFile);
        self::assertEquals($referenceFile, $xml);
    }
}
