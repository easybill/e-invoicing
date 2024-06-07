<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\Peppol\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class AllowanceCharge
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ChargeIndicator')]
    public ?string $chargeIndicator = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AllowanceChargeReasonCode')]
    public ?string $allowanceChargeReasonCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AllowanceChargeReason')]
    public ?string $allowanceChargeReason = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('MultiplierFactorNumeric')]
    public ?string $multiplierFactorNumeric = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Amount')]
    public ?Amount $amount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('BaseAmount')]
    public ?Amount $baseAmount = null;

    #[Type(TaxCategory::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxCategory')]
    public ?TaxCategory $taxCategory = null;
}
