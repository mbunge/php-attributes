<?php
/**
 * @copyright Marco Bunge <marco_bunge@web.de>
 */

namespace Mbunge\PhpAttributes\Tests\Unit\Resolver;

use Mbunge\PhpAttributes\Resolver\AttributeResolverInterface;
use Mbunge\PhpAttributes\Resolver\ChainedAttributeResolver;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use Mbunge\PhpAttributes\Tests\TestAttributeStub;
use Mbunge\PhpAttributes\Tests\TestStub;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class ChainedAttributeResolverTest
 * @package Mbunge\PhpAttributes\Tests\Unit\Resolver
 * @copyright Marco Bunge <marco_bunge@web.de>
 */
class ChainedAttributeResolverTest extends TestCase
{

    public function testResolve()
    {
        $dtoMock = new ResolvedAttributeDto(new TestAttributeStub('a'), new ReflectionClass(TestStub::class));
        $resolverMock = $this->createMock(AttributeResolverInterface::class);

        $resolverMock
            ->method('resolve')->willReturn([$dtoMock]);

        $resolvers = [
            $resolverMock,
            $resolverMock
        ];

        $resolver = new ChainedAttributeResolver($resolvers);
        $result = $resolver->resolve(TestStub::class);

        $this->assertCount(2, $result);
        $this->assertContainsOnlyInstancesOf(ResolvedAttributeDto::class, $result);

    }
}
