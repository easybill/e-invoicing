<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Validators\Traits;

trait RemoveXmlMutatesTrait
{
    public static function removeXmlMutates(string $xml): string
    {
        return preg_replace('/<\?xmute(.|\s)*?>+/m', '', $xml, limit: -1);
    }
}
