<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Validators\Traits;

trait ReformatXmlTrait
{
    public static function reformatXml(string $xml): string
    {
        $xml = preg_replace('/<!--(.|\s)*?-->/', '', $xml);
        assert(null !== $xml);

        $doc = new \DOMDocument('1.0', 'UTF-8');
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        $doc->loadXML($xml);
        $result = $doc->saveXML();
        return false !== $result ? $result : '';
    }
}
