<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TradeSettlementPaymentMeans
{
    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TypeCode')]
    public string $typeCode;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('Information')]
    public ?string $information = null;

    #[Type(CreditorFinancialAccount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('PayeePartyCreditorFinancialAccount')]
    public ?CreditorFinancialAccount $payeePartyCreditorFinancialAccount = null;

    #[Type(CreditorFinancialInstitution::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('PayeeSpecifiedCreditorFinancialInstitution')]
    public ?CreditorFinancialInstitution $payeeSpecifiedCreditorFinancialInstitution = null;

    #[Type(DebtorFinancialAccount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('PayerPartyDebtorFinancialAccount')]
    public ?DebtorFinancialAccount $payerPartyDebtorFinancialAccount = null;

    #[Type(TradeSettlementFinancialCard::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ApplicableTradeSettlementFinancialCard')]
    public ?TradeSettlementFinancialCard $applicableTradeSettlementFinancialCard = null;
}
