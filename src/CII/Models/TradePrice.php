<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

final class TradePrice
{
    #[Type(Amount::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('ChargeAmount')]
    public Amount $chargeAmount;

    #[Type(Quantity::class)]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\SerializedName('BasisQuantity')]
    public ?Quantity $basisQuantity = null;

    /** @var TradeAllowanceCharge[] */
    #[Type('array<easybill\eInvoicing\CII\Models\TradeAllowanceCharge>')]
    #[XmlList(entry: 'AppliedTradeAllowanceCharge', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?array $appliedTradeAllowanceCharge = null;

    /** @param array<TradeAllowanceCharge>|null $tradeAllowanceCharge */
    public static function create(string $amount, ?Quantity $quantity = null, ?array $tradeAllowanceCharge = null): self
    {
        $self = new self();
        $self->chargeAmount = Amount::create($amount);
        $self->basisQuantity = $quantity;
        $self->appliedTradeAllowanceCharge = $tradeAllowanceCharge;
        return $self;
    }
}
