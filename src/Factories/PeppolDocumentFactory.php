<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Factories;

use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISCredit;
use easybill\eInvoicing\Specs\Peppol\Documents\PeppolBISInvoice;

final class PeppolDocumentFactory
{
    public static function createInvoice(): PeppolBISInvoice
    {
        $document = new PeppolBISInvoice();
        $document->customizationId = 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0';
        $document->profileId = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
        return $document;
    }

    public static function createCredit(): PeppolBISCredit
    {
        $document = new PeppolBISCredit();
        $document->customizationId = 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0';
        $document->profileId = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
        return $document;
    }
}
