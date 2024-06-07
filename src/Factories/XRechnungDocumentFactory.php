<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Factories;

use Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use Easybill\eInvoicing\Specs\XRechnung\CII\Models\DocumentContextParameter;
use Easybill\eInvoicing\Specs\XRechnung\CII\Models\ExchangedDocument;
use Easybill\eInvoicing\Specs\XRechnung\CII\Models\ExchangedDocumentContext;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblCredit;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblInvoice;

final class XRechnungDocumentFactory
{
    public static function createCiiDocument(): XRechnungCiiInvoice
    {
        $document = new XRechnungCiiInvoice();
        $document->exchangedDocument = new ExchangedDocument();
        $document->exchangedDocumentContext = new ExchangedDocumentContext();
        $document->exchangedDocumentContext->documentContextParameter = new DocumentContextParameter();
        $document->exchangedDocumentContext->documentContextParameter->id = 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0';
        return $document;
    }

    public static function createUblInvoice(): XRechnungUblInvoice
    {
        $document = new XRechnungUblInvoice();
        $document->customizationId = 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0';
        $document->profileId = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
        return $document;
    }

    public static function createUblCredit(): XRechnungUblCredit
    {
        $document = new XRechnungUblCredit();
        $document->customizationId = 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0';
        $document->profileId = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
        return $document;
    }
}
