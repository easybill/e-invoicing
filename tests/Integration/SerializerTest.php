<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\CII\Models\DocumentContextParameter;
use easybill\eInvoicing\CII\Models\ExchangedDocument;
use easybill\eInvoicing\CII\Models\ExchangedDocumentContext;
use easybill\eInvoicing\ConfiguredSerializer;
use easybill\eInvoicing\Handlers\TrimStringValueHandler;
use easybill\eInvoicing\Reader;
use easybill\eInvoicing\Transformer;
use easybill\eInvoicingTests\TestCase;

final class SerializerTest extends TestCase
{
    public function testSerializerWillTrimValues(): void
    {
        $invoice = new CrossIndustryInvoice();
        $invoice->exchangedDocument = new ExchangedDocument();
        $invoice->exchangedDocumentContext = new ExchangedDocumentContext();
        $invoice->exchangedDocumentContext->documentContextParameter = new DocumentContextParameter();
        $invoice->exchangedDocumentContext->documentContextParameter->id = '   urn:cen.eu:en16931:2017';
        $invoice->exchangedDocument->id = '   471102   ';

        $transformer = new Transformer(ConfiguredSerializer::createWithHandlers([
            new TrimStringValueHandler(),
        ]));

        $xml = $transformer->transformToXml($invoice);
        $result = Reader::create()->read($xml);

        self::assertTrue($result->isSuccess());
        self::assertInstanceOf(CrossIndustryInvoice::class, $result->getDocument());
        self::assertEquals('urn:cen.eu:en16931:2017', $result->getDocument()->exchangedDocumentContext->documentContextParameter->id);
        self::assertEquals('471102', $result->getDocument()->exchangedDocument->id);
    }
}
