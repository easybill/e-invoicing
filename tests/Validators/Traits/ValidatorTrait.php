<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests\Validators\Traits;

use easybill\eInvoicingTests\Validators\KositValidator;
use easybill\eInvoicingTests\Validators\PeppolValidator;

trait ValidatorTrait
{
    public function validateWithKositValidator(string $xml): void
    {
        $validator = new KositValidator();

        $errors = $validator->validate($xml);

        self::assertNull($errors, $errors ?? '');
    }

    public function validateWithPeppolValidator(string $xml): void
    {
        $validator = new PeppolValidator();

        $errors = $validator->validate($xml);

        self::assertNull($errors, $errors ?? '');
    }
}
