<?php

declare(strict_types=1);

namespace Easybill\eInvoicing\Specs\Peppol\Documents;

use Easybill\eInvoicing\Specs\Peppol\Models\CreditNoteLine;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

#[XmlRoot('CreditNote')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2', prefix: '')]
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
    'billingReference',
    'orderReference',
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
final class PeppolBISCredit extends PeppolBISAbstractDocument
{
    #[Type('int')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CreditNoteTypeCode')]
    public ?int $creditNoteTypeCode = null;

    /** @var CreditNoteLine[] */
    #[Type('array<Easybill\eInvoicing\Specs\Peppol\Models\CreditNoteLine>')]
    #[SerializedName('CreditNoteLine')]
    #[XmlList(entry: 'CreditNoteLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $creditNoteLine = [];
}
