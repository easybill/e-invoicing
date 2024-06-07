<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Factories;

use easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\DocumentContextParameter;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\ExchangedDocument;
use easybill\eInvoicing\Specs\ZUGFeRD\Models\ExchangedDocumentContext;

final class ZUGFeRDDocumentFactory
{
    public static function createDocument(ZUGFeRDProfileType $ZUGFeRDProfileType): ZUGFeRDInvoice
    {
        $document = new ZUGFeRDInvoice();
        $document->exchangedDocument = new ExchangedDocument();
        $document->exchangedDocumentContext = new ExchangedDocumentContext();
        $document->exchangedDocumentContext->documentContextParameter = new DocumentContextParameter();
        $document->exchangedDocumentContext->documentContextParameter->id = match ($ZUGFeRDProfileType) {
            ZUGFeRDProfileType::BASIC => 'urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic',
            ZUGFeRDProfileType::BASIC_WL => 'urn:factur-x.eu:1p0:basicwl',
            ZUGFeRDProfileType::MINIMUM => 'urn:factur-x.eu:1p0:minimum',
            ZUGFeRDProfileType::EN16931 => 'urn:cen.eu:en16931:2017',
            ZUGFeRDProfileType::EXTENDED => 'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended'
        };

        return $document;
    }
}
