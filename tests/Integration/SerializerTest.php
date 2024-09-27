<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration;

use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\CII\Models\DocumentContextParameter;
use easybill\eInvoicing\CII\Models\ExchangedDocument;
use easybill\eInvoicing\CII\Models\ExchangedDocumentContext;
use easybill\eInvoicing\Reader;
use easybill\eInvoicing\Transformer;

test(
    'That the serializer will trim values',
    function () {
        $invoice = new CrossIndustryInvoice();
        $invoice->exchangedDocument = new ExchangedDocument();
        $invoice->exchangedDocumentContext = new ExchangedDocumentContext();
        $invoice->exchangedDocumentContext->documentContextParameter = new DocumentContextParameter();
        $invoice->exchangedDocumentContext->documentContextParameter->id = '   urn:cen.eu:en16931:2017';
        $invoice->exchangedDocument->id = '   471102   ';

        $xml = Transformer::create()->transformToXml($invoice);
        $result = Reader::create()->read($xml);

        expect($result->isSuccess())
            ->toBeTrue()
            ->and($result->getDocument())
            ->toBeInstanceOf(CrossIndustryInvoice::class)
            ->and($result->getDocument()->exchangedDocumentContext->documentContextParameter->id)
            ->toEqual('urn:cen.eu:en16931:2017')
            ->and($result->getDocument()->exchangedDocument->id)
            ->toEqual('471102')
        ;
    }
);
