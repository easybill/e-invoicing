<?php

declare(strict_types=1);

namespace easybill\eInvoicing\UBL\Documents;

use easybill\eInvoicing\Enums\DocumentType;
use easybill\eInvoicing\UBL\Models\DocumentReference;
use easybill\eInvoicing\UBL\Models\InvoiceLine;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

#[XmlRoot('ubl:Invoice')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2', prefix: '')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[AccessorOrder(order: 'custom', custom: [
    'customizationId',
    'profileId',
    'id',
    'issueDate',
    'dueDate',
    'invoiceTypeCode',
    'note',
    'taxPointDate',
    'documentCurrencyCode',
    'buyerReference',
    'invoicePeriod',
    'billingReference',
    'orderReference',
    'originatorDocumentReference',
    'contractDocumentReference',
    'additionalDocumentReference',
    'projectReference',
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
final class UblInvoice extends UblAbstractDocument
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('DueDate')]
    public ?string $dueDate = null;

    #[Type(DocumentType::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('InvoiceTypeCode')]
    public ?DocumentType $invoiceTypeCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxPointDate')]
    public ?string $taxPointDate = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ContractDocumentReference')]
    public ?DocumentReference $contractDocumentReference = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AdditionalDocumentReference')]
    public ?DocumentReference $additionalDocumentReference = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ProjectReference')]
    public ?DocumentReference $projectReference = null;

    /** @var InvoiceLine[] */
    #[Type('array<easybill\eInvoicing\UBL\Models\InvoiceLine>')]
    #[SerializedName('InvoiceLine')]
    #[XmlList(entry: 'InvoiceLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $invoiceLine = [];
}
