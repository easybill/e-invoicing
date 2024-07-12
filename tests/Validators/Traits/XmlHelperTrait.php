<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Validators\Traits;

trait XmlHelperTrait
{
    public static function removeXmlMutates(string $xml): string
    {
        return preg_replace('/<\?xmute(.|\s)*?>+/m', '', $xml, limit: -1);
    }

    public static function fixUblRootNode(string $xml): string
    {
        $fixedCreditNoteNode = '<ubl:CreditNote xmlns:ubl="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">';
        $fixedInvoiceNoteNode = '<ubl:Invoice xmlns:ubl="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">';
        $xml = preg_replace('/<CreditNote[^>]*>/', $fixedCreditNoteNode, $xml);
        $xml = preg_replace('/<\/CreditNote>/', '</ubl:CreditNote>', $xml);
        $xml = preg_replace('/<\/Invoice>/', '</ubl:Invoice>', $xml);
        return preg_replace('/<Invoice[^>]*>/', $fixedInvoiceNoteNode, $xml);
    }
}
