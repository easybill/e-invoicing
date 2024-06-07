<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class CreditorFinancialInstitution
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BICID')]
    public Id $bicId;
}
