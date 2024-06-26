<?php

declare(strict_types=1);

namespace easybill\eInvoicing\CII\Models;

use JMS\Serializer\Annotation as JMS;

final class Indicator
{
    #[JMS\Type('boolean')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100')]
    #[JMS\SerializedName('Indicator')]
    public bool $indicator;
}
