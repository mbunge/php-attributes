<?php

namespace Mbunge\PhpAttributes\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class Mbunge\PhpAttributesTest
 * @package Mbunge\PhpAttributes\Tests
 */
class PhpAttributesTest extends TestCase
{

    public function testFeature()
    {
        $stub = new TestStub();
        $this->assertContains('class', TestAttributeStub::$change);
        $this->assertContains('constant', TestAttributeStub::$change);
        $this->assertContains('property', TestAttributeStub::$change);
        $this->assertContains('method', TestAttributeStub::$change);
        $this->assertContains('parameter', TestAttributeStub::$change);
    }

}
