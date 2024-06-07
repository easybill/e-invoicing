<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\ZUGFeRD;

use Easybill\eInvoicing\Specs\ZUGFeRD\Documents\ZUGFeRDInvoice;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Transformer
{
    public const GUIDELINE_SPECIFIED_DOCUMENT_CONTEXT_ID_EXTENDED = 'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended';

    public function __construct(private SerializerInterface $serializer) {}

    public function transform(ZUGFeRDInvoice $crossIndustryInvoice): string
    {
        return $this->serializer->serialize($crossIndustryInvoice, 'xml');
    }

    public static function create(): Transformer
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->build()
        ;
        return new self($serializer);
    }
}
