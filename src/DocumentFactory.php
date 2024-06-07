<?php

declare(strict_types=1);

namespace easybill\eInvoicing;

use easybill\eInvoicing\Factories\PeppolDocumentFactory;
use easybill\eInvoicing\Factories\XRechnungDocumentFactory;
use easybill\eInvoicing\Factories\ZUGFeRDDocumentFactory;
use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISCredit;
use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISInvoice;
use easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblCredit;
use easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblInvoice;
use easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;

final class DocumentFactory
{
    public static function createZUGFeRDInvoice(ZUGFeRDProfileType $ZUGFeRDProfileType): ZUGFeRDInvoice
    {
        return ZUGFeRDDocumentFactory::createDocument($ZUGFeRDProfileType);
    }

    public static function createPeppolInvoice(): PeppolBISInvoice
    {
        return PeppolDocumentFactory::createInvoice();
    }

    public static function createPeppolCredit(): PeppolBISCredit
    {
        return PeppolDocumentFactory::createCredit();
    }

    public static function createXRechnungCIIInvoice(): XRechnungCiiInvoice
    {
        return XRechnungDocumentFactory::createCiiDocument();
    }

    public static function createXRechnungUBLInvoice(): XRechnungUblInvoice
    {
        return XRechnungDocumentFactory::createUblInvoice();
    }

    public static function createXRechnungUBLCredit(): XRechnungUblCredit
    {
        return XRechnungDocumentFactory::createUblCredit();
    }
}
