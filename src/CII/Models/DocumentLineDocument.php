<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

#[AccessorOrder(order: 'custom', custom: ['lineId', 'notes'])]
final class DocumentLineDocument
{
    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineID')]
    public string $lineId;

    /** @var Note[] */
    #[Type('array<easybill\eInvoicing\CII\Models\Note>')]
    #[XmlList(entry: 'IncludedNote', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $notes = [];

    public static function create(string $lineId): self
    {
        $self = new self();
        $self->lineId = $lineId;
        return $self;
    }
}
