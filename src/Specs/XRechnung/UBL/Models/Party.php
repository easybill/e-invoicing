<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class Party
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('EndpointID')]
    public ?Id $endpointId = null;

    #[Type(Identification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PartyIdentification')]
    public ?Identification $partyIdentification = null;

    #[Type(PartyName::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PartyName')]
    public ?PartyName $partyName = null;

    #[Type(Address::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PostalAddress')]
    public ?Address $postalAddress = null;

    /** @var PartyTaxScheme[] */
    #[Type('array<Easybill\eInvoicing\Specs\XRechnung\UBL\Models\PartyTaxScheme>')]
    #[SerializedName('PartyTaxScheme')]
    #[XmlList(entry: 'PartyTaxScheme', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $partyTaxScheme = [];

    #[Type(PartyLegalEntity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PartyLegalEntity')]
    public ?PartyLegalEntity $partyLegalEntity;

    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Contact')]
    public ?Contact $contact;
}
