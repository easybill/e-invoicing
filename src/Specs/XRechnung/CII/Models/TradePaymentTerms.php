<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\CII\Models;

use JMS\Serializer\Annotation as JMS;

final class TradePaymentTerms
{
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('Description')]
    public ?string $description = null;

    #[JMS\Type(DateTime::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('DueDateDateTime')]
    public ?DateTime $dueDate = null;

    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('DirectDebitMandateID')]
    public ?string $directDebitMandateID = null;
}
