<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Validators;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

final class KositValidator
{
    public function validate(string $xml): ?string
    {
        $httpClient = new Client();

        $response = $httpClient->request('POST', 'http://localhost:8080', [
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/xml',
            ],
            RequestOptions::BODY => $xml,
            RequestOptions::TIMEOUT => 10,
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::HTTP_ERRORS => false,
        ]);

        if (200 === $response->getStatusCode()) {
            return null;
        }

        return implode(', ', $this->extractErrors($response->getBody()->getContents()));
    }

    /** @return array<string>  */
    private function extractErrors(string $report): array
    {
        $doc = new \DOMDocument();

        $doc->loadXML($report);

        $docXpath = new \DOMXPath($doc);

        $noScenarioMatched = $docXpath->query('//rep:noScenarioMatched');

        if (false !== $noScenarioMatched && $noScenarioMatched->count() > 0) {
            return ['No validation scenario matched. (Unsupported document type)'];
        }

        $errorMsgElems = $docXpath->query('//rep:validationStepResult/rep:message');

        if (is_iterable($errorMsgElems)) {
            return array_map(fn (\DOMNode $node) => $node->textContent, iterator_to_array($errorMsgElems));
        }

        throw new \RuntimeException('could not parse validation errors');
    }
}
