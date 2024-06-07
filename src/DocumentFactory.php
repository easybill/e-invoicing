<?php

declare(strict_types=1);

namespace Easybill\eInvoicing;

use Easybill\eInvoicing\Factories\PeppolDocumentFactory;
use Easybill\eInvoicing\Factories\XRechnungDocumentFactory;
use Easybill\eInvoicing\Factories\ZUGFeRDDocumentFactory;
use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISCredit;
use Easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISInvoice;
use Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblCredit;
use Easybill\eInvoicing\Specs\XRechnung\UBL\Documents\XRechnungUblInvoice;
use Easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use Easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;

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
