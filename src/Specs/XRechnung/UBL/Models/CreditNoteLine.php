<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

#[AccessorOrder(order: 'custom', custom: [
    'id',
    'note',
    'creditedQuantity',
    'lineExtensionAmount',
    'invoicePeriod',
    'orderLineReference',
    'allowanceCharge',
    'item',
    'price',
])]
final class CreditNoteLine extends AbstractDocumentLine
{
    #[Type(Quantity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CreditedQuantity')]
    public ?Quantity $creditedQuantity = null;
}
