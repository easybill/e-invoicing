<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\ZUGFeRD\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class ExchangedDocumentContext
{
    #[Type(DocumentContextParameter::class)]
    #[XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BusinessProcessSpecifiedDocumentContextParameter')]
    public ?DocumentContextParameter $businessProcessSpecifiedDocumentContextParameter = null;

    #[Type(DocumentContextParameter::class)]
    #[XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('GuidelineSpecifiedDocumentContextParameter')]
    public DocumentContextParameter $documentContextParameter;
}
