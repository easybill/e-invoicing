<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Integration;

use Easybill\eInvoicing\DocumentFactory;
use Easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;

test('check if the ZUGFeRD document is constructed as expected', function () {
    $document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::BASIC);

    expect($document->exchangedDocument)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext->documentContextParameter->id)
        ->toBe('urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic')
    ;

    $document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::BASIC_WL);

    expect($document->exchangedDocument)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext->documentContextParameter->id)
        ->toBe('urn:factur-x.eu:1p0:basicwl')
    ;

    $document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::MINIMUM);

    expect($document->exchangedDocument)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext->documentContextParameter->id)
        ->toBe('urn:factur-x.eu:1p0:minimum')
    ;

    $document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::EN16931);

    expect($document->exchangedDocument)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext->documentContextParameter->id)
        ->toBe('urn:cen.eu:en16931:2017')
    ;

    $document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::EXTENDED);

    expect($document->exchangedDocument)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext->documentContextParameter->id)
        ->toBe('urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended')
    ;
});

test('check if the XRechnung documents are constructed as expected', function () {
    $document = DocumentFactory::createXRechnungCIIInvoice();

    expect($document->exchangedDocument)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext)
        ->not()
        ->toBeNull()
        ->and($document->exchangedDocumentContext->documentContextParameter->id)
        ->toBe('urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0')
    ;

    $document = DocumentFactory::createXRechnungUBLInvoice();

    expect($document->customizationId)
        ->toBe('urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0')
        ->and($document->profileId)
        ->toBe('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0')
    ;

    $document = DocumentFactory::createXRechnungUBLCredit();

    expect($document->customizationId)
        ->toBe('urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0')
        ->and($document->profileId)
        ->toBe('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0')
    ;
});

test('check if the PEPPOL documents are constructed as expected', function () {
    $document = DocumentFactory::createPeppolInvoice();

    expect($document->customizationId)
        ->toBe('urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0')
        ->and($document->profileId)
        ->toBe('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0')
    ;

    $document = DocumentFactory::createPeppolCredit();

    expect($document->customizationId)
        ->toBe('urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0')
        ->and($document->profileId)
        ->toBe('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0')
    ;
});
