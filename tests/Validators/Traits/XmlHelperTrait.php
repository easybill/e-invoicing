<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Validators\Traits;

trait XmlHelperTrait
{
    public static function removeXmlMutates(string $xml): string
    {
        return preg_replace('/<\?xmute(.|\s)*?>+/m', '', $xml, limit: -1);
    }

    public static function fixCIIRootNode(string $xml): string
    {
        $fixedCIIRootNode = '<rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:qdt="urn:un:unece:uncefact:data:standard:QualifiedDataType:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:udt="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100">';
        return preg_replace('/<rsm:CrossIndustryInvoice\b[^>]*>/', $fixedCIIRootNode, $xml);
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
