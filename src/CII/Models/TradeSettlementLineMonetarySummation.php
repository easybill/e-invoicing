<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TradeSettlementLineMonetarySummation
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineTotalAmount')]
    public Amount $totalAmount;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TotalAllowanceChargeAmount')]
    public ?Amount $totalAllowanceChargeAmount = null;

    public static function create(string $totalAmount, ?string $totalAllowanceChargeAmount = null): self
    {
        $self = new self();
        $self->totalAmount = Amount::create($totalAmount);
        if (null != $totalAllowanceChargeAmount) {
            $self->totalAllowanceChargeAmount = Amount::create($totalAllowanceChargeAmount);
        }
        return $self;
    }
}
