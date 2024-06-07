<?php

declare(strict_types=1);

namespace easybill\eInvoicingTests;

use easybill\eInvoicingTests\Validators\Traits\AssertXmlOutputTrait;
use easybill\eInvoicingTests\Validators\Traits\ReformatXmlTrait;
use easybill\eInvoicingTests\Validators\Traits\RemoveXmlMutatesTrait;
use easybill\eInvoicingTests\Validators\Traits\ValidatorTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use ReformatXmlTrait;
    use RemoveXmlMutatesTrait;
    use ValidatorTrait;
    use AssertXmlOutputTrait;
}
