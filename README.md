# e-invoicing
[![Generic badge](https://img.shields.io/badge/Version-0.5.0-important.svg)]()
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

### Example creating ZUGFeRD/factur-x XML

```PHP
use Easybill\eInvoicing\DocumentFactory;
use Easybill\eInvoicing\Specs\ZUGFeRD\Enums\ZUGFeRDProfileType;

// The document factory offers handy shortcut functions to assemble a document for every supported specification
// with the correct basic structure. $document is now ready to be filled with data related to your business case.
$document = DocumentFactory::createZUGFeRDInvoice(ZUGFeRDProfileType::EN16931);
$document->exchangedDocument->id = '471102';
$document->exchangedDocument->issueDateTime = DateTime::create(102, '20200305');
// etc...
$xml = ZUGFeRDTransformer::create()->transform($invoice)


```

### Example reading an unknown XML file

There might be the case that you receive some XML which may or may not be supported by this library. `e-invoicing` offers a handy
way to just parse that XML and see if is marshable to one of the supported formats.

```PHP
use Easybill\eInvoicing\DocumentXmlReader;
use \Easybill\eInvoicing\Specs\XRechnung\CII\Documents\XRechnungCiiInvoice;

$xml = file_get_contents($exampleXmlFile);

$readerResult = DocumentXmlReader::create()->read($xml);

// If the format is supported and valid in its structure the following check will be true
$readerResult->isSuccess()

// If the format is not supported or a different error occurred the result will have the state error.
$readerResult->isError()

// If it's valid you may retrieve the deserialized object from the dto.
// Invoking the getDocument method on an error will result in a LogicException
$document = $readerResult->getDocument(); 

if($document instanceof XRechnungCiiInvoice){
    
}


```

## Considerations

### Limitations

### Validation

