<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Validators;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

final class PeppolValidator
{
    public function validate(string $xml): ?string
    {
        $httpClient = new Client();

        $response = $httpClient->request('POST', 'http://localhost:8081/validation', [
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/xml',
            ],
            RequestOptions::BODY => $xml,
            RequestOptions::TIMEOUT => 3,
            RequestOptions::CONNECT_TIMEOUT => 3,
            RequestOptions::HTTP_ERRORS => false,
        ]);

        if (200 === $response->getStatusCode()) {
            return null;
        }

        return implode(PHP_EOL, $this->extractErrors($response->getBody()->getContents()));
    }

    /** @return array<string>  */
    private function extractErrors(string $report): array
    {
        $doc = new \DOMDocument();

        $doc->loadXML($report);

        $docXpath = new \DOMXPath($doc);

        $errorMsgElems = $docXpath->query('//svrl:failed-assert');

        if (is_iterable($errorMsgElems)) {
            return array_map(fn (\DOMNode $node) => trim($node->textContent), iterator_to_array($errorMsgElems));
        }

        throw new \RuntimeException('could not parse validation errors');
    }
}
