<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\Peppol\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

#[AccessorOrder(order: 'custom', custom: [
    'streetName',
    'additionalStreetName',
    'cityName',
    'postalZone',
    'countrySubentity',
    'addressLines',
    'country',
])]
final class Address
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('StreetName')]
    public ?string $streetName = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AdditionalStreetName')]
    public ?string $additionalStreetName = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CityName')]
    public ?string $cityName = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PostalZone')]
    public ?string $postalZone = null;

    /** @var AddressLine[] */
    #[Type('array<easybill\eInvoicing\Specs\Peppol\Models\AddressLine>')]
    #[SerializedName('AddressLine')]
    #[XmlList(entry: 'AddressLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $addressLines = [];

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CountrySubentity')]
    public ?string $countrySubentity = null;

    #[Type(Country::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Country')]
    public ?Country $country = null;
}
