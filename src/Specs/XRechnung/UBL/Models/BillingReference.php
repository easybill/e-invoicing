<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\XRechnung\UBL\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class BillingReference
{
    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('InvoiceDocumentReference')]
    public ?DocumentReference $invoiceDocumentReference = null;
}
