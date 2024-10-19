<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use easybill\eInvoicing\Enums\DocumentType;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class ExchangedDocument
{
    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ID')]
    public string $id;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('Name')]
    public ?string $name = null;

    #[Type(DocumentType::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TypeCode')]
    public DocumentType $typeCode;

    #[Type(DateTime::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('IssueDateTime')]
    public DateTime $issueDateTime;

    /**
     * @var string[]
     */
    #[Type('array<string>')]
    #[XmlElement(cdata: false)]
    #[XmlList(entry: 'LanguageID', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $languageId = [];

    /**
     * @var Note[]
     */
    #[Type('array<easybill\eInvoicing\CII\Models\Note>')]
    #[XmlList(entry: 'IncludedNote', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $notes = [];
}
