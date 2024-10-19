<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use easybill\eInvoicing\Enums\CountryCode;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TradeAddress
{
    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('PostcodeCode')]
    public ?string $postcode = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineOne')]
    public ?string $lineOne = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineTwo')]
    public ?string $lineTwo = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineThree')]
    public ?string $lineThree = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('CityName')]
    public ?string $city = null;

    #[Type(CountryCode::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('CountryID')]
    public ?CountryCode $countryCode = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('CountrySubDivisionName')]
    public ?string $countrySubDivisionName = null;
}
