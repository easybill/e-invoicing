# e-invoicing
[![Generic badge](https://img.shields.io/badge/Version-0.1.0-important.svg)]()
[![Generic badge](https://img.shields.io/badge/License-MIT-blue.svg)]()

## Introduction
`e-invoicing` is a library to generate and read data of the specifications Peppol BIS Billing, XRechnung (UBL & CII)
and ZUGFeRD / factur-x. The library offers the possibility to generate EN16931 conform e-invoices.

### Current supported specification
- Peppol BIS Billing - Version 3.0.15
- XRechnung - Version 3.0.1
- ZUGFeRD / Factur-x - Version 2.2.0 / Version 1.0.06

## Usage
```bash
composer require easybill/e-invoicing
```

### Example: Creating ZUGFeRD/factur-x XML
The document factory offers handy shortcut functions to assemble a document for every supported specification
with the correct basic structure. $document is now ready to be filled with data related to your business case.

```PHP
use easybill\eInvoicing\DocumentFactory;
use easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;

$document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::EN16931);
$document->exchangedDocument->id = '471102';
$document->exchangedDocument->issueDateTime = DateTime::create(102, '20200305');
// etc...
$xml = ZUGFeRDTransformer::create()->transform($invoice)
```

### Example: Reading a known XML file format

If you only want to support a subset of the offered specifications (as an example ZUGFeRD/factur-x) you may use the
builder and reader from the corresponding namespace.

```PHP
use easybill\eInvoicing\Specs\ZUGFeRD\Reader;
use easybill\eInvoicing\Specs\ZUGFeRD\Transformer;

$xml = file_get_contents($exampleXmlFile);

$document = Reader::create()->transform($xml);

$document->exchangedDocument->name = 'Example Value'
  
$xml = Transformer::create()->transform($document);
```

### Example: Reading an unknown XML file

There might be the case that you receive some XML which may or may not be supported by this library. `e-invoicing` offers a handy
way to just parse that XML and see if is deserializable to one of the supported formats.

```PHP
use easybill\eInvoicing\DocumentXmlReader;
use easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;

$xml = file_get_contents($exampleXmlFile);

$readerResult = DocumentXmlReader::create()->read($xml);

// If the format is supported and valid in its structure the following check will be true
$readerResult->isSuccess()

// If the format is not supported or a different error occurred the result will have the state error.
$readerResult->isError()

// If it's valid you may retrieve the deserialized object from the dto.
// Invoking the getDocument method on an error will result in a LogicException
$document = $readerResult->getDocument(); 

if ($document instanceof XRechnungCiiInvoice) {
    // do something with the XRechnungCiiInvoice
}
```

You can refer to the [tests](https://github.com/easybill/e-invoicing/tree/main/tests/Integration) in this repository for examples of using this library.

## Considerations

### Limitations


### Validation

## Issues and contribution