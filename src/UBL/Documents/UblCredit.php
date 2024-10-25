<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Documents;

use easybill\eInvoicing\Enums\DocumentType;
use easybill\eInvoicing\UBL\Models\CreditNoteLine;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

#[XmlRoot('ubl:CreditNote')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2', prefix: '')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[AccessorOrder(order: 'custom', custom: [
    'customizationId',
    'profileId',
    'id',
    'issueDate',
    'creditNoteTypeCode',
    'note',
    'documentCurrencyCode',
    'taxCurrencyCode',
    'accountingCost',
    'buyerReference',
    'invoicePeriod',
    'orderReference',
    'billingReference',
    'despatchDocumentReference',
    'receiptDocumentReference',
    'originatorDocumentReference',
    'accountingSupplierParty',
    'accountingCustomerParty',
    'accountingCustomerParty',
    'payeeParty',
    'taxRepresentativeParty',
    'delivery',
    'paymentMeans',
    'paymentTerms',
    'allowanceCharge',
    'taxTotal',
    'legalMonetaryTotal',
])]
final class UblCredit extends UblAbstractDocument
{
    #[Type(DocumentType::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CreditNoteTypeCode')]
    public DocumentType $creditNoteTypeCode;

    /** @var CreditNoteLine[] */
    #[Type('array<' . CreditNoteLine::class . '>')]
    #[SerializedName('CreditNoteLine')]
    #[XmlList(entry: 'CreditNoteLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $creditNoteLine = [];
}
