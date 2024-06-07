<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TaxRegistration
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ID')]
    public Id $registration;

    public static function create(string $id, ?string $schemeID = null): self
    {
        $self = new self();
        $self->registration = Id::create($id, $schemeID);
        return $self;
    }
}
