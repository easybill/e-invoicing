<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\XRechnung\UBL\Documents;

use easybill\eInvoicing\Specs\XRechnung\UBL\Models\AccountingParty;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\AllowanceCharge;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\BillingReference;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Delivery;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\DocumentReference;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\LegalMonetaryTotal;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Note;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\OrderReference;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Party;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PaymentMeans;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\PaymentTerms;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\Period;
use easybill\eInvoicing\Specs\XRechnung\UBL\Models\TaxTotal;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

abstract class XRechnungUblAbstractDocument
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CustomizationID')]
    public ?string $customizationId = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ProfileID')]
    public ?string $profileId = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    public ?string $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('IssueDate')]
    public ?string $issueDate = null;

    /** @var Note[] */
    #[Type('array<easybill\eInvoicing\Specs\XRechnung\UBL\Models\Note>')]
    #[SerializedName('Note')]
    #[XmlList(entry: 'Note', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    public array $note = [];

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('DocumentCurrencyCode')]
    public ?string $documentCurrencyCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('BuyerReference')]
    public ?string $buyerReference = null;

    #[Type(Period::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('InvoicePeriod')]
    public ?Period $invoicePeriod = null;

    #[Type(BillingReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('BillingReference')]
    public ?BillingReference $billingReference = null;

    #[Type(OrderReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OrderReference')]
    public ?OrderReference $orderReference = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OriginatorDocumentReference')]
    public ?DocumentReference $originatorDocumentReference = null;

    #[Type(AccountingParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AccountingSupplierParty')]
    public ?AccountingParty $accountingSupplierParty = null;

    #[Type(AccountingParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AccountingCustomerParty')]
    public ?AccountingParty $accountingCustomerParty = null;

    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PayeeParty')]
    public ?Party $payeeParty = null;

    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxRepresentativeParty')]
    public ?Party $taxRepresentativeParty = null;

    #[Type(Delivery::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Delivery')]
    public ?Delivery $delivery = null;

    /** @var PaymentMeans[] */
    #[Type('array<easybill\eInvoicing\Specs\XRechnung\UBL\Models\PaymentMeans>')]
    #[SerializedName('PaymentMeans')]
    #[XmlList(entry: 'PaymentMeans', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $paymentMeans = [];

    #[Type(PaymentTerms::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PaymentTerms')]
    public ?PaymentTerms $paymentTerms = null;

    #[Type(AllowanceCharge::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AllowanceCharge')]
    public ?AllowanceCharge $allowanceCharge = null;

    /** @var TaxTotal[] */
    #[Type('array<easybill\eInvoicing\Specs\XRechnung\UBL\Models\TaxTotal>')]
    #[SerializedName('TaxTotal')]
    #[XmlList(entry: 'TaxTotal', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    public array $taxTotal = [];

    #[Type(LegalMonetaryTotal::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('LegalMonetaryTotal')]
    public ?LegalMonetaryTotal $legalMonetaryTotal = null;
}
