<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

#[AccessorOrder(order: 'custom', custom: ['calculatedAmount', 'typeCode', 'exemptionReason', 'basisAmount', 'categoryCode', 'exemptionReasonCode', 'taxPointDate', 'dueDateTypeCode', 'rateApplicablePercent'])]
final class TradeTax
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('CalculatedAmount')]
    public ?Amount $calculatedAmount = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TypeCode')]
    public string $typeCode;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('BasisAmount')]
    public ?Amount $basisAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineTotalBasisAmount')]
    public ?Amount $lineTotalBasisAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('AllowanceChargeBasisAmount')]
    public ?Amount $allowanceChargeBasisAmount = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ApplicablePercent')]
    public ?string $applicablePercent = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('CategoryCode')]
    public ?string $categoryCode = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('RateApplicablePercent')]
    public ?string $rateApplicablePercent = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ExemptionReason')]
    public ?string $exemptionReason = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ExemptionReasonCode')]
    public ?string $exemptionReasonCode = null;

    #[Type(Date::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TaxPointDate')]
    public ?Date $taxPointDate = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('DueDateTypeCode')]
    public ?string $dueDateTypeCode = null;

    public static function create(
        string $typeCode,
        ?Amount $calculatedAmount = null,
        ?Amount $basisAmount = null,
        ?Amount $lineTotalBasisAmount = null,
        ?Amount $allowanceChargeBasisAmount = null,
        ?string $applicablePercent = null,
        ?string $categoryCode = null,
        ?string $rateApplicablePercent = null,
        ?string $exemptionReason = null,
        ?string $exemptionReasonCode = null,
        ?Date $taxPointDate = null,
        ?string $dueDateTypeCode = null,
    ): self {
        $self = new self();
        $self->calculatedAmount = $calculatedAmount;
        $self->typeCode = $typeCode;
        $self->basisAmount = $basisAmount;
        $self->lineTotalBasisAmount = $lineTotalBasisAmount;
        $self->allowanceChargeBasisAmount = $allowanceChargeBasisAmount;
        $self->applicablePercent = $applicablePercent;
        $self->categoryCode = $categoryCode;
        $self->rateApplicablePercent = $rateApplicablePercent;
        $self->exemptionReason = $exemptionReason;
        $self->exemptionReasonCode = $exemptionReasonCode;
        $self->taxPointDate = $taxPointDate;
        $self->dueDateTypeCode = $dueDateTypeCode;
        return $self;
    }
}
