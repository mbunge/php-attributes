<?php

namespace Mbunge\PhpAttributes\Tests\Integration;

use Mbunge\PhpAttributes\Tests\TestAttributeStub;
use Mbunge\PhpAttributes\Tests\TestStub;
use PHPUnit\Framework\TestCase;

/**
 * Class Mbunge\PhpAttributesTest
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Tests
 */
class PhpAttributesTest extends TestCase
{

    public function testFeature()
    {
        // instantiate class for auto resolving attributes
        /** @noinspection PhpExpressionResultUnusedInspection */
        new TestStub();
        $this->assertContains('class', TestAttributeStub::$change);
        $this->assertContains('constant', TestAttributeStub::$change);
        $this->assertContains('property', TestAttributeStub::$change);
        $this->assertContains('method', TestAttributeStub::$change);
        $this->assertContains('parameter', TestAttributeStub::$change);
    }

}
