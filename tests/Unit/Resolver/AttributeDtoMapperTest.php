<?php

namespace Mbunge\PhpAttributes\Tests\Unit\Resolver;

use Mbunge\PhpAttributes\Resolver\AttributeDto;
use Mbunge\PhpAttributes\Resolver\AttributeDtoMapper;
use Mbunge\PhpAttributes\Tests\TestStub;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class AttributeDtoMapperTest
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Tests\Unit\Resolver
 */
class AttributeDtoMapperTest extends TestCase
{

    public function testMap()
    {
        $mapper = new AttributeDtoMapper();

        /** @noinspection PhpUnhandledExceptionInspection */
        $result = $mapper->map(TestStub::class);

        $this->assertCount(5, $result);
        $this->assertContainsOnlyInstancesOf(AttributeDto::class, $result);
    }

    public function testMapException()
    {
        $this->expectException(ReflectionException::class);
        $mapper = new AttributeDtoMapper();
        $mapper->map('');
    }
}
