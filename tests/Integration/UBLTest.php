<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Integration;

use easybill\eInvoicing\Enums\CountryCode;
use easybill\eInvoicing\Enums\CurrencyCode;
use easybill\eInvoicing\Enums\DocumentType;
use easybill\eInvoicing\Enums\ElectronicAddressScheme;
use easybill\eInvoicing\Enums\UnitCode;
use easybill\eInvoicing\Reader;
use easybill\eInvoicing\Transformer;
use easybill\eInvoicing\UBL\Documents\UblAbstractDocument;
use easybill\eInvoicing\UBL\Documents\UblInvoice;
use easybill\eInvoicing\UBL\Models\AccountingParty;
use easybill\eInvoicing\UBL\Models\Address;
use easybill\eInvoicing\UBL\Models\Amount;
use easybill\eInvoicing\UBL\Models\CommodityClassification;
use easybill\eInvoicing\UBL\Models\Contact;
use easybill\eInvoicing\UBL\Models\Country;
use easybill\eInvoicing\UBL\Models\EndpointId;
use easybill\eInvoicing\UBL\Models\Id;
use easybill\eInvoicing\UBL\Models\Identification;
use easybill\eInvoicing\UBL\Models\InvoiceLine;
use easybill\eInvoicing\UBL\Models\Item;
use easybill\eInvoicing\UBL\Models\ItemClassificationCode;
use easybill\eInvoicing\UBL\Models\LegalMonetaryTotal;
use easybill\eInvoicing\UBL\Models\Note;
use easybill\eInvoicing\UBL\Models\OrderLineReference;
use easybill\eInvoicing\UBL\Models\Party;
use easybill\eInvoicing\UBL\Models\PartyLegalEntity;
use easybill\eInvoicing\UBL\Models\PartyName;
use easybill\eInvoicing\UBL\Models\PartyTaxScheme;
use easybill\eInvoicing\UBL\Models\PayeeFinancialAccount;
use easybill\eInvoicing\UBL\Models\PaymentMeans;
use easybill\eInvoicing\UBL\Models\PaymentMeansCode;
use easybill\eInvoicing\UBL\Models\PaymentTerms;
use easybill\eInvoicing\UBL\Models\Period;
use easybill\eInvoicing\UBL\Models\Price;
use easybill\eInvoicing\UBL\Models\Quantity;
use easybill\eInvoicing\UBL\Models\TaxCategory;
use easybill\eInvoicing\UBL\Models\TaxScheme;
use easybill\eInvoicing\UBL\Models\TaxSubtotal;
use easybill\eInvoicing\UBL\Models\TaxTotal;
use easybill\eInvoicingTests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Finder\Finder;

final class UBLTest extends TestCase
{
    #[DataProvider('xrechnungExampleProvider')]
    public function testBuildingValidXRechnung30DocumentWithSimpleStructure(string $pathToXmlExample): void
    {
        $exampleXml = file_get_contents($pathToXmlExample);
        self::assertIsString($exampleXml);
        $exampleXml = self::removeXmlMutates($exampleXml);
        $exampleXml = self::reformatXml($exampleXml);

        $this->validateWithKositValidator($exampleXml);

        $invoice = new UblInvoice(
            customizationId: 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0',
            profileId: 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
            id: '123456XX',
            issueDate: '2016-04-04',
            documentType: DocumentType::COMMERCIAL_INVOICE,
            currencyCode: CurrencyCode::EUR
        );

        $invoice->buyerReference = '04011000-12345-03';

        // Notes
        $invoice->note[] = $note = new Note();
        $note->value = '#ADU#Es gelten unsere Allgem. Geschäftsbedingungen, die Sie unter […] finden.';

        // Supplier
        $supplierParty = new Party();
        $supplierParty->endpointId = new EndpointId();
        $supplierParty->endpointId->schemeID = ElectronicAddressScheme::ELECTRONIC_MAIL;
        $supplierParty->endpointId->value = 'seller@email.de';
        $supplierParty->partyName = new PartyName();
        $supplierParty->partyName->name = '[Seller trading name]';
        $supplierParty->postalAddress = new Address();
        $supplierParty->postalAddress->streetName = '[Seller address line 1]';
        $supplierParty->postalAddress->cityName = '[Seller city]';
        $supplierParty->postalAddress->postalZone = '12345';
        $supplierParty->postalAddress->country = new Country();
        $supplierParty->postalAddress->country->identificationCode = CountryCode::DE;

        $partyTaxScheme = new PartyTaxScheme();
        $partyTaxScheme->companyId = 'DE 123456789';
        $partyTaxScheme->taxScheme = new TaxScheme();
        $partyTaxScheme->taxScheme->id = 'VAT';
        $supplierParty->partyTaxScheme[] = $partyTaxScheme;

        $supplierParty->partyLegalEntity = new PartyLegalEntity();
        $supplierParty->partyLegalEntity->id = new Id();
        $supplierParty->partyLegalEntity->id->value = '[HRA-Eintrag]';
        $supplierParty->partyLegalEntity->companyLegalForm = '123/456/7890, HRA-Eintrag in […]';
        $supplierParty->partyLegalEntity->registrationName = '[Seller name]';
        $supplierParty->contact = new Contact();
        $supplierParty->contact->name = 'nicht vorhanden';
        $supplierParty->contact->telephone = '+49 1234-5678';
        $supplierParty->contact->electronicMail = 'seller@email.de';

        $invoice->accountingSupplierParty = $accountingSupplierParty = new AccountingParty();
        $accountingSupplierParty->party = $supplierParty;

        // Customer
        $customerParty = new Party();
        $customerParty->endpointId = new EndpointId();
        $customerParty->endpointId->schemeID = ElectronicAddressScheme::ELECTRONIC_MAIL;
        $customerParty->endpointId->value = 'buyer@info.de';
        $customerParty->partyIdentification = new Identification();
        $customerParty->partyIdentification->id = new Id();
        $customerParty->partyIdentification->id->value = '[Buyer identifier]';
        $customerParty->postalAddress = new Address();
        $customerParty->postalAddress->streetName = '[Buyer address line 1]';
        $customerParty->postalAddress->cityName = '[Buyer city]';
        $customerParty->postalAddress->postalZone = '12345';
        $customerParty->postalAddress->country = new Country();
        $customerParty->postalAddress->country->identificationCode = CountryCode::DE;
        $customerParty->partyLegalEntity = new PartyLegalEntity();
        $customerParty->partyLegalEntity->registrationName = '[Buyer name]';

        $invoice->accountingCustomerParty = $accountingCustomerParty = new AccountingParty();
        $accountingCustomerParty->party = $customerParty;

        // PaymentMeans
        $paymentMeans = new PaymentMeans();
        $paymentMeans->paymentMeansCode = new PaymentMeansCode();
        $paymentMeans->paymentMeansCode->value = '58';
        $paymentMeans->payeeFinancialAccount = new PayeeFinancialAccount();
        $paymentMeans->payeeFinancialAccount->id = new Id();
        $paymentMeans->payeeFinancialAccount->id->value = 'DE75512108001245126199';
        $invoice->paymentMeans[] = $paymentMeans;

        // PaymentTerms
        $invoice->paymentTerms = new PaymentTerms();
        $invoice->paymentTerms->note = 'Zahlbar sofort ohne Abzug.';

        // Tax Total
        $taxTotal = new TaxTotal();
        $taxTotal->taxAmount = new Amount();
        $taxTotal->taxAmount->currencyID = CurrencyCode::EUR;
        $taxTotal->taxAmount->value = '22.04';

        $taxSubtotal = new TaxSubtotal();
        $taxSubtotal->taxableAmount = new Amount();
        $taxSubtotal->taxableAmount->currencyID = CurrencyCode::EUR;
        $taxSubtotal->taxableAmount->value = '314.86';
        $taxSubtotal->taxAmount = new Amount();
        $taxSubtotal->taxAmount->currencyID = CurrencyCode::EUR;
        $taxSubtotal->taxAmount->value = '22.04';
        $taxSubtotal->taxCategory = new TaxCategory();
        $taxSubtotal->taxCategory->id = new Id();
        $taxSubtotal->taxCategory->id->value = 'S';
        $taxSubtotal->taxCategory->percent = '7';
        $taxSubtotal->taxCategory->taxScheme = new TaxScheme();
        $taxSubtotal->taxCategory->taxScheme->id = 'VAT';

        $taxTotal->taxSubtotal[] = $taxSubtotal;
        $invoice->taxTotal[] = $taxTotal;

        // LegalMonetaryTotal
        $invoice->legalMonetaryTotal = new LegalMonetaryTotal();
        $invoice->legalMonetaryTotal->lineExtensionAmount = new Amount();
        $invoice->legalMonetaryTotal->lineExtensionAmount->currencyID = CurrencyCode::EUR;
        $invoice->legalMonetaryTotal->lineExtensionAmount->value = '314.86';
        $invoice->legalMonetaryTotal->taxExclusiveAmount = new Amount();
        $invoice->legalMonetaryTotal->taxExclusiveAmount->currencyID = CurrencyCode::EUR;
        $invoice->legalMonetaryTotal->taxExclusiveAmount->value = '314.86';
        $invoice->legalMonetaryTotal->taxInclusiveAmount = new Amount();
        $invoice->legalMonetaryTotal->taxInclusiveAmount->currencyID = CurrencyCode::EUR;
        $invoice->legalMonetaryTotal->taxInclusiveAmount->value = '336.9';
        $invoice->legalMonetaryTotal->payableAmount = new Amount();
        $invoice->legalMonetaryTotal->payableAmount->currencyID = CurrencyCode::EUR;
        $invoice->legalMonetaryTotal->payableAmount->value = '336.9';

        // Invoice Lines
        $invoice->invoiceLine = [];

        // Invoice Line 1
        $invoice->invoiceLine[] = $invoiceLine1 = new InvoiceLine();
        $invoiceLine1->id = new Id();
        $invoiceLine1->id->value = 'Zeitschrift [...]';
        $invoiceLine1->note = 'Die letzte Lieferung im Rahmen des abgerechneten Abonnements erfolgt in 12/2016 Lieferung erfolgt / erfolgte direkt vom Verlag';
        $invoiceLine1->invoicedQuantity = new Quantity();
        $invoiceLine1->invoicedQuantity->unitCode = UnitCode::XPP;
        $invoiceLine1->invoicedQuantity->value = '1';
        $invoiceLine1->lineExtensionAmount = new Amount();
        $invoiceLine1->lineExtensionAmount->currencyID = CurrencyCode::EUR;
        $invoiceLine1->lineExtensionAmount->value = '288.79';
        $invoiceLine1->invoicePeriod = new Period();
        $invoiceLine1->invoicePeriod->startDate = '2016-01-01';
        $invoiceLine1->invoicePeriod->endDate = '2016-12-31';
        $invoiceLine1->orderLineReference = new OrderLineReference();
        $invoiceLine1->orderLineReference->lineId = new Id();
        $invoiceLine1->orderLineReference->lineId->value = '6171175.1';

        // Item 1
        $invoiceLine1->item[] = $item1 = new Item();
        $item1->description = 'Zeitschrift Inland';
        $item1->name = 'Zeitschrift [...]';
        $item1->sellersItemIdentification = new Identification();
        $item1->sellersItemIdentification->id = new Id();
        $item1->sellersItemIdentification->id->value = '246';
        $item1->commodityClassification[] = $commodityClassification = new CommodityClassification();
        $commodityClassification->itemClassificationCode = new ItemClassificationCode();
        $commodityClassification->itemClassificationCode->listId = 'IB';
        $commodityClassification->itemClassificationCode->value = '0721-880X';
        $item1->classifiedTaxCategory = new TaxCategory();
        $item1->classifiedTaxCategory->id = new Id();
        $item1->classifiedTaxCategory->id->value = 'S';
        $item1->classifiedTaxCategory->percent = '7';
        $item1->classifiedTaxCategory->taxScheme = new TaxScheme();
        $item1->classifiedTaxCategory->taxScheme->id = 'VAT';

        $invoiceLine1->price = new Price();
        $invoiceLine1->price->priceAmount = new Amount();
        $invoiceLine1->price->priceAmount->currencyID = CurrencyCode::EUR;
        $invoiceLine1->price->priceAmount->value = '288.79';

        // Invoice Line 2
        $invoice->invoiceLine[] = $invoiceLine2 = new InvoiceLine();
        $invoiceLine2->id = new Id();
        $invoiceLine2->id->value = 'Porto + Versandkosten';
        $invoiceLine2->invoicedQuantity = new Quantity();
        $invoiceLine2->invoicedQuantity->unitCode = UnitCode::XPP;
        $invoiceLine2->invoicedQuantity->value = '1';
        $invoiceLine2->lineExtensionAmount = new Amount();
        $invoiceLine2->lineExtensionAmount->currencyID = CurrencyCode::EUR;
        $invoiceLine2->lineExtensionAmount->value = '26.07';

        // Item 2
        $invoiceLine2->item[] = $item2 = new Item();
        $item2->name = 'Porto + Versandkosten';
        $item2->classifiedTaxCategory = new TaxCategory();
        $item2->classifiedTaxCategory->id = new Id();
        $item2->classifiedTaxCategory->id->value = 'S';
        $item2->classifiedTaxCategory->percent = '7';
        $item2->classifiedTaxCategory->taxScheme = new TaxScheme();
        $item2->classifiedTaxCategory->taxScheme->id = 'VAT';
        $invoiceLine2->price = new Price();
        $invoiceLine2->price->priceAmount = new Amount();
        $invoiceLine2->price->priceAmount->currencyID = CurrencyCode::EUR;
        $invoiceLine2->price->priceAmount->value = '26.07';

        $xml = Transformer::create()->transformToXml($invoice);
        $xml = self::reformatXml($xml);

        self::assertSame($exampleXml, $xml);
        $this->validateWithKositValidator($xml);
    }

    /** @return array<string, array{0: string}> */
    public static function xrechnungExampleProvider(): array
    {
        return [
            '01.01a-INVOICE_ubl' => [__DIR__ . '/Examples/UBL/01.01a-INVOICE_ubl.xml'],
        ];
    }

    #[DataProvider('ublExamplesProvider')]
    public function testReadingUblExamplesAndTransformingBackToXmlIsIdentical(string $pathToXmlExample): void
    {
        $xml = file_get_contents($pathToXmlExample);

        self::assertNotFalse($xml);

        $xml = self::fixUblRootNode($xml);

        $reader = Reader::create()->read($xml);

        self::assertTrue($reader->isSuccess());
        self::assertInstanceOf(UblAbstractDocument::class, $reader->getDocument());

        $document = $reader->getDocument();

        self::assertInstanceOf(UblAbstractDocument::class, $document);

        $xmlFromObject = Transformer::create()->transformToXml($document);

        self::assertSame(self::reformatXml($xml), self::reformatXml($xmlFromObject));
    }

    /** @return array<string, array{0: string}> */
    public static function ublExamplesProvider(): array
    {
        return [
            '01.01a-INVOICE_ubl' => [__DIR__ . '/Examples/UBL/01.01a-INVOICE_ubl.xml'],
            'Allowance-example' => [__DIR__ . '/Examples/UBL/Allowance-example.xml'],
            'base-creditnote-correction' => [__DIR__ . '/Examples/UBL/base-creditnote-correction.xml'],
            'base-example' => [__DIR__ . '/Examples/UBL/base-example.xml'],
            'base-negative-inv-correction' => [__DIR__ . '/Examples/UBL/base-negative-inv-correction.xml'],
            'BIS3_Invoice_negativ' => [__DIR__ . '/Examples/UBL/BIS3_Invoice_negativ.XML'],
            'BIS3_Invoice_positive' => [__DIR__ . '/Examples/UBL/BIS3_Invoice_positive.XML'],
            'guide-example1' => [__DIR__ . '/Examples/UBL/guide-example1.xml'],
            'guide-example2' => [__DIR__ . '/Examples/UBL/guide-example2.xml'],
            'guide-example3' => [__DIR__ . '/Examples/UBL/guide-example3.xml'],
            'issue116' => [__DIR__ . '/Examples/UBL/issue116.xml'],
            'sales-order-example' => [__DIR__ . '/Examples/UBL/sales-order-example.xml'],
            'sample-discount-price' => [__DIR__ . '/Examples/UBL/sample-discount-price.xml'],
            'ubl-tc434-creditnote1' => [__DIR__ . '/Examples/UBL/ubl-tc434-creditnote1.xml'],
            'ubl-tc434-example1' => [__DIR__ . '/Examples/UBL/ubl-tc434-example1.xml'],
            'ubl-tc434-example2' => [__DIR__ . '/Examples/UBL/ubl-tc434-example2.xml'],
            'ubl-tc434-example3' => [__DIR__ . '/Examples/UBL/ubl-tc434-example3.xml'],
            'ubl-tc434-example4' => [__DIR__ . '/Examples/UBL/ubl-tc434-example4.xml'],
            'ubl-tc434-example5' => [__DIR__ . '/Examples/UBL/ubl-tc434-example5.xml'],
            'ubl-tc434-example6' => [__DIR__ . '/Examples/UBL/ubl-tc434-example6.xml'],
            'ubl-tc434-example7' => [__DIR__ . '/Examples/UBL/ubl-tc434-example7.xml'],
            'ubl-tc434-example8' => [__DIR__ . '/Examples/UBL/ubl-tc434-example8.xml'],
            'ubl-tc434-example9' => [__DIR__ . '/Examples/UBL/ubl-tc434-example9.xml'],
            'ubl-tc434-example10' => [__DIR__ . '/Examples/UBL/ubl-tc434-example10.xml'],
            'vat-category-E' => [__DIR__ . '/Examples/UBL/vat-category-E.xml'],
            'vat-category-O' => [__DIR__ . '/Examples/UBL/vat-category-O.xml'],
            'Vat-category-S' => [__DIR__ . '/Examples/UBL/Vat-category-S.xml'],
            'vat-category-Z' => [__DIR__ . '/Examples/UBL/vat-category-Z.xml'],
        ];
    }

    #[DataProvider('convertedCiiExamplesProvider')]
    public function testReadingConvertedCiiExamplesToUblIsSuccessful(string $pathToXmlExample): void
    {
        $xml = file_get_contents($pathToXmlExample);

        self::assertNotFalse($xml);

        $xml = self::fixUblRootNode($xml);

        $reader = Reader::create()->read($xml);

        self::assertTrue($reader->isSuccess());
        self::assertInstanceOf(UblAbstractDocument::class, $reader->getDocument());

        $document = $reader->getDocument();

        self::assertInstanceOf(UblAbstractDocument::class, $document);

        $xmlFromObject = Transformer::create()->transformToXml($document);

        self::assertSame(self::reformatXml($xml), self::reformatXml($xmlFromObject));
    }

    public static function convertedCiiExamplesProvider(): \Generator
    {
        $finder = (new Finder())
            ->files()
            ->name('*.xml')
            ->in(__DIR__ . '/Examples/UBL/Converted')
        ;

        foreach ($finder as $file) {
            yield $file->getFilename() => [$file->getRealPath()];
        }
    }
}
