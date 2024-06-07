<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Specs\ZUGFeRD\Enums;

enum ZUGFeRDProfileType: string
{
    case BASIC = 'BASIC';
    case BASIC_WL = 'BASIC_WL';
    case MINIMUM = 'MINIMUM';
    case EN16931 = 'EN16931';
    case EXTENDED = 'EXTENDED';
}
