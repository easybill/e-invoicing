<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class DebtorFinancialAccount
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('IBANID')]
    public ?Id $ibanId = null;
}
