<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class PayeeFinancialAccount
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    public ?Id $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Name')]
    public ?string $name = null;

    #[Type(FinancialInstitutionBranch::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('FinancialInstitutionBranch')]
    public ?FinancialInstitutionBranch $financialInstitutionBranch = null;
}
