<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

#[AccessorOrder(order: 'custom', custom: [
    'id',
    'note',
    'invoicedQuantity',
    'lineExtensionAmount',
    'invoicePeriod',
    'orderLineReference',
    'allowanceCharge',
    'item',
    'price',
])]
final class InvoiceLine extends AbstractDocumentLine
{
    #[Type(Quantity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('InvoicedQuantity')]
    public ?Quantity $invoicedQuantity = null;
}
