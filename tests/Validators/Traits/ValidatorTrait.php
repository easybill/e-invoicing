<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests\Validators\Traits;

use Easybill\eInvoicingTests\Validators\KositValidator;
use Easybill\eInvoicingTests\Validators\PeppolValidator;

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
