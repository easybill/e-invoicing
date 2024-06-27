<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Enums;

enum DocumentType: int
{
    /**
     * Applicable for Invoice.
     */
    case REQUEST_FOR_PAYMENT = 71;

    /**
     * Applicable for Invoice.
     */
    case DEBIT_NOTE_RELATED_TO_GOODS_OR_SERVICES = 80;

    /**
     * Applicable for Credit Note.
     */
    case CREDIT_NOTE_RELATED_TO_GOODS_OR_SERVICES = 81;

    /**
     * Applicable for Invoice.
     */
    case METERED_SERVICES_INVOICE = 82;

    /**
     * Applicable for Credit Note.
     */
    case CREDIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS = 83;

    /**
     * Applicable for Invoice.
     */
    case DEBIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS = 84;

    /**
     * Applicable for Invoice.
     */
    case INVOICING_DATA_SHEET = 130;

    /**
     * Applicable for Invoice.
     */
    case DIRECT_PAYMENT_VALUATION = 202;

    /**
     * Applicable for Invoice.
     */
    case PROVISIONAL_PAYMENT_VALUATION = 203;

    /**
     * Applicable for Invoice.
     */
    case PAYMENT_VALUATION = 204;

    /**
     * Applicable for Invoice.
     */
    case INTERIM_APPLICATION_FOR_PAYMENT = 211;

    /**
     * Applicable for Credit Note.
     */
    case SELF_BILLED_CREDIT_NOTE = 261;

    /**
     * Applicable for Credit Note.
     */
    case CONSOLIDATED_CREDIT_NOTE_GOODS_AND_SERVICES = 262;

    /**
     * Applicable for Invoice.
     */
    case PRICE_VARIATION_INVOICE = 295;

    /**
     * Applicable for Credit Note.
     */
    case CREDIT_NOTE_FOR_PRICE_VARIATION = 296;

    /**
     * Applicable for Credit Note.
     */
    case DELCREDERE_CREDIT_NOTE = 308;

    /**
     * Applicable for Invoice.
     */
    case PROFORMA_INVOICE = 325;

    /**
     * Applicable for Invoice.
     */
    case PARTIAL_INVOICE = 326;

    /**
     * Applicable for Invoice.
     */
    case COMMERCIAL_INVOICE = 380;

    /**
     * Applicable for Credit Note.
     */
    case CREDIT_NOTE = 381;

    /**
     * Applicable for Invoice.
     */
    case DEBIT_NOTE = 383;

    /**
     * Applicable for Invoice.
     */
    case CORRECTED_INVOICE = 384;

    /**
     * Applicable for Invoice.
     */
    case CONSOLIDATED_INVOICE = 385;

    /**
     * Applicable for Invoice.
     */
    case PREPAYMENT_INVOICE = 386;

    /**
     * Applicable for Invoice.
     */
    case HIRE_INVOICE = 387;

    /**
     * Applicable for Invoice.
     */
    case TAX_INVOICE = 388;

    /**
     * Applicable for Invoice.
     */
    case SELF_BILLED_INVOICE = 389;

    /**
     * Applicable for Invoice.
     */
    case DELCREDERE_INVOICE = 390;

    /**
     * Applicable for Invoice.
     */
    case FACTORED_INVOICE = 393;

    /**
     * Applicable for Invoice.
     */
    case LEASE_INVOICE = 394;

    /**
     * Applicable for Invoice.
     */
    case CONSIGNMENT_INVOICE = 395;

    /**
     * Applicable for Credit Note.
     */
    case FACTORED_CREDIT_NOTE = 396;

    /**
     * Applicable for Credit Note.
     */
    case OPTICAL_CHARACTER_READING_OCR_PAYMENT_CREDIT_NOTE = 420;

    /**
     * Applicable for Invoice.
     */
    case DEBIT_ADVICE = 456;

    /**
     * Applicable for Invoice.
     */
    case REVERSAL_OF_DEBIT = 457;

    /**
     * Applicable for Credit Note.
     */
    case REVERSAL_OF_CREDIT = 458;

    /**
     * Applicable for Invoice.
     */
    case SELF_BILLED_DEBIT_NOTE = 527;

    /**
     * Applicable for Credit Note.
     */
    case FORWARDER_S_CREDIT_NOTE = 532;

    /**
     * Applicable for Invoice.
     */
    case INSURER_S_INVOICE = 575;

    /**
     * Applicable for Invoice.
     */
    case FORWARDER_S_INVOICE = 623;

    /**
     * Applicable for Invoice.
     */
    case PORT_CHARGES_DOCUMENTS = 633;

    /**
     * Applicable for Invoice.
     */
    case INVOICE_INFORMATION_FOR_ACCOUNTING_PURPOSES = 751;

    /**
     * Applicable for Invoice.
     */
    case FREIGHT_INVOICE = 780;

    /**
     * Applicable for Invoice.
     */
    case CUSTOMS_INVOICE = 935;
}
