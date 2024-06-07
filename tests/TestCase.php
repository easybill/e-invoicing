<?php

declare(strict_types=1);

namespace Easybill\eInvoicingTests;

use Easybill\eInvoicingTests\Validators\Traits\AssertXmlOutputTrait;
use Easybill\eInvoicingTests\Validators\Traits\ReformatXmlTrait;
use Easybill\eInvoicingTests\Validators\Traits\RemoveXmlMutatesTrait;
use Easybill\eInvoicingTests\Validators\Traits\ValidatorTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use ReformatXmlTrait;
    use RemoveXmlMutatesTrait;
    use ValidatorTrait;
    use AssertXmlOutputTrait;
}
