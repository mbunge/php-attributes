<?php

namespace Mbunge\PhpAttributes\Tests\Unit\Resolver;

use Closure;
use Mbunge\PhpAttributes\Resolver\AttributeDtoMapper;
use Mbunge\PhpAttributes\Resolver\AttributeResolver;
use Mbunge\PhpAttributes\Resolver\FilterClassAttributeResolverDecorator;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use Mbunge\PhpAttributes\Tests\TestStub;
use Mbunge\PhpAttributes\Tests\TestStubInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use stdClass;

/**
 * Class FilterClassAttributeResolverDecoratorTest
 * @package Mbunge\PhpAttributes\Tests\Unit\Resolver
 * @since 2.1.0
 */
class FilterClassAttributeResolverDecoratorTest extends TestCase
{
    /**
     * @return Closure[][]
     */
    public function filterProvider(): array
    {
        return [
            [
                fn(string $className) => str_starts_with($className, 'Mbunge\PhpAttributes\Tests')
            ],
            [
                fn(string $className) => (new ReflectionClass($className))->implementsInterface(TestStubInterface::class)
            ],
            [
                fn(string $className) => str_ends_with($className, 'Stub')
            ],

        ];
    }

    /**
     * @dataProvider filterProvider
     * @param $filter
     */
    public function testResolveWithPositiveFilter($filter)
    {
        $resolver = new AttributeResolver(new AttributeDtoMapper());
        $decoratedResolver = new FilterClassAttributeResolverDecorator(
            $resolver,
            $filter
        );
        $result = $decoratedResolver->resolve(TestStub::class);

        $this->assertCount(5, $result);
        $this->assertContainsOnlyInstancesOf(ResolvedAttributeDto::class, $result);
    }

    public function testResolveWithNegativeFilter()
    {
        $resolver = new AttributeResolver(new AttributeDtoMapper());
        $decoratedResolver = new FilterClassAttributeResolverDecorator(
            $resolver,
            fn(string $className) => $className === TestStub::class
        );
        $result = $decoratedResolver->resolve(stdClass::class);

        $this->assertCount(0, $result);
    }
}
