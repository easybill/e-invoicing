<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class PaymentMeans
{
    #[Type(PaymentMeansCode::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PaymentMeansCode')]
    public ?PaymentMeansCode $paymentMeansCode = null;

    #[Type(StringValue::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('InstructionNote')]
    public ?string $instructionNote = null;

    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PaymentID')]
    public ?Id $paymentId = null;

    #[Type(PaymentMandate::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PaymentMandate')]
    public ?PaymentMandate $payment = null;

    #[Type(PayeeFinancialAccount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PayeeFinancialAccount')]
    public ?PayeeFinancialAccount $payeeFinancialAccount = null;
}
