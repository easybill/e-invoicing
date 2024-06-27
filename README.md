# e-invoicing
[![Generic badge](https://img.shields.io/badge/Version-0.1.0-important.svg)]()
[![Generic badge](https://img.shields.io/badge/License-MIT-blue.svg)]()

## Introduction
`e-invoicing` is a library to generate and read data of specifications which comply with the EN16931.
It is possible to generate CIUS like XRechnung, Peppol BIS Billing and ZUGFeRD / factur-x.

## Usage
```bash
composer require easybill/e-invoicing
```

### Example: EN16931 Cross Industry Invoice
In this example we generate a normal EN16931 as Cross Industry Invoice.

```PHP
use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;
use easybill\eInvoicing\CII\Models\DocumentContextParameter;
use easybill\eInvoicing\CII\Models\ExchangedDocument;
use easybill\eInvoicing\CII\Models\ExchangedDocumentContext;
use easybill\eInvoicing\CII\Models\DateTime;
use easybill\eInvoicing\Transformer;

$document = new CrossIndustryInvoice();
$document->exchangedDocument = new ExchangedDocument();
$document->exchangedDocumentContext = new ExchangedDocumentContext();
$document->exchangedDocumentContext->documentContextParameter = new DocumentContextParameter();
$document->exchangedDocumentContext->documentContextParameter->id = 'urn:cen.eu:en16931:2017';
$document->exchangedDocument->id = '471102';
$document->exchangedDocument->issueDateTime = DateTime::create(102, '20200305');
// etc...
$xml = Transformer::create()->transformToXml($document)
```

### Example: EN16931 Universal Business Language Invoice
In this example we generate a CIUS (XRechnung 3.0) as UBL document

```PHP
use easybill\eInvoicing\Transformer;
use easybill\eInvoicing\UBL\Documents\UblInvoice;

$document = new UblInvoice();
$document->customizationId = 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0';
$document->profileId = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
$document->id = '123456XX';
$document->issueDate = '2016-04-04';
$document->invoiceTypeCode = 380;
$document->documentCurrencyCode = 'EUR';
$document->buyerReference = '04011000-12345-03';
// etc...
$xml = Transformer::create()->transformToXml($document)
```

### Example: Reading an unknown XML file

There might be the case that you receive some XML which may or may not be supported by this library. `e-invoicing` offers a handy
way to just parse that XML and see if is deserializable to UBL or CII.

```PHP
use easybill\eInvoicing\Reader;
use easybill\eInvoicing\CII\Documents\CrossIndustryInvoice;

$xml = file_get_contents($exampleXmlFile);

$readerResult = Reader::create()->read($xml);

// If the format is supported and valid in its structure the following check will be true
$readerResult->isSuccess()

// If the format is not supported or a different error occurred the result will have the state error.
$readerResult->isError()

// If it's valid you may retrieve the deserialized object from the dto.
// Invoking the getDocument method on an error will result in a LogicException
$document = $readerResult->getDocument(); 

if ($document instanceof CrossIndustryInvoice) {
    // do something with the CrossIndustryInvoice
}
```

You can refer to the [tests](https://github.com/easybill/e-invoicing/tree/main/tests/Integration) in this repository for examples of using this library.

## Considerations

### Limitations
This library does not offer any way to validate the structured data against the rules of EN16931 or any of the CIUS. 
Please take a look at the folder [Validators](https://github.com/easybill/e-invoicing/tree/main/tests/Validators) in the tests folder. There you will find ways to validate the documents against the CIUS specification
rulesets. ZUGFeRD/factur-x offers XSD-Schema-Files which you may use directly in your PHP code. KOSiT offers a dedicated validator to validate your EN16931
document against the XRechnung CIUS specification.

## Issues and contribution
Feel free to create Pull-Requests or Issue if you have trouble with this library or any related resource. 