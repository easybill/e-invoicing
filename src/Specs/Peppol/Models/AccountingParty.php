<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\Peppol\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class AccountingParty
{
    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Party')]
    public ?Party $party = null;
}
