<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\Peppol\Documents;

use easybill\eInvoicing\Specs\Peppol\Models\DocumentReference;
use easybill\eInvoicing\Specs\Peppol\Models\InvoiceLine;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

#[XmlRoot('Invoice')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2', prefix: '')]
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
    'taxCurrencyCode',
    'accountingCost',
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
final class PeppolBISInvoice  extends PeppolBISAbstractDocument
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('DueDate')]
    public ?string $dueDate = null;

    #[Type('int')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('InvoiceTypeCode')]
    public ?int $invoiceTypeCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxPointDate')]
    public ?string $taxPointDate = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ContractDocumentReference')]
    public ?DocumentReference $contractDocumentReference = null;

    /** @var DocumentReference[] */
    #[Type('array<easybill\eInvoicing\Specs\Peppol\Models\DocumentReference>')]
    #[SerializedName('AdditionalDocumentReference')]
    #[XmlList(entry: 'AdditionalDocumentReference', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $additionalDocumentReference = [];

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ProjectReference')]
    public ?DocumentReference $projectReference = null;

    /** @var InvoiceLine[] */
    #[Type('array<easybill\eInvoicing\Specs\Peppol\Models\InvoiceLine>')]
    #[SerializedName('InvoiceLine')]
    #[XmlList(entry: 'InvoiceLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $invoiceLine = [];
}
