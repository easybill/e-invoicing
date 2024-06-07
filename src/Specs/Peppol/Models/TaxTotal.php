<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\Peppol\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class TaxTotal
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxAmount')]
    public ?Amount $taxAmount = null;

    /** @var TaxSubtotal[] */
    #[Type('array<easybill\eInvoicing\Specs\Peppol\Models\TaxSubtotal>')]
    #[SerializedName('TaxSubtotal')]
    #[XmlList(entry: 'TaxSubtotal', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $taxSubtotal = [];
}
