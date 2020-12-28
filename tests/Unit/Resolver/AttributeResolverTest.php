<?php

namespace Mbunge\PhpAttributes\Tests\Unit\Resolver;

use Mbunge\PhpAttributes\Resolver\AttributeDtoMapper;
use Mbunge\PhpAttributes\Resolver\AttributeResolver;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use Mbunge\PhpAttributes\Tests\TestStub;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class AttributeResolverTest
 * @package Mbunge\PhpAttributes\Tests\Unit\Resolver
 */
class AttributeResolverTest extends TestCase
{
    public function testResolve()
    {
        $resolver = new AttributeResolver(new AttributeDtoMapper());
        /** @noinspection PhpUnhandledExceptionInspection */
        $result = $resolver->resolve(TestStub::class);

        $this->assertCount(5, $result);
        $this->assertContainsOnlyInstancesOf(ResolvedAttributeDto::class, $result);
    }

    public function testResolveException()
    {
        $this->expectException(ReflectionException::class);
        $resolver = new AttributeResolver(new AttributeDtoMapper());
        $resolver->resolve('');
    }
}
