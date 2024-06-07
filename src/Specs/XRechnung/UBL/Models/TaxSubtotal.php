<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TaxSubtotal
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxableAmount')]
    public ?Amount $taxableAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxAmount')]
    public ?Amount $taxAmount = null;

    #[Type(TaxCategory::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxCategory')]
    public ?TaxCategory $taxCategory = null;
}
