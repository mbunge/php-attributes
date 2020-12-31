<?php

namespace Mbunge\PhpAttributes\Resolver;

use function array_filter;
use function array_reduce;

/**
 * Run multiple resolvers and merge resolved results
 * Class ChainedAttributeResolver
 * @package Mbunge\PhpAttributes\Resolver;
 */
class ChainedAttributeResolver implements AttributeResolverInterface
{
    /**
     * ChainedAttributeResolver constructor.
     * @param AttributeResolverInterface[] $resolvers
     */
    public function __construct(private array $resolvers)
    {
    }

    public function resolve(string $className): array
    {
        // filter resolver instances
        $resolvers = array_filter($this->resolvers, fn($resolver) => $resolver instanceof AttributeResolverInterface);
        return array_reduce(
            $resolvers,
            fn(array $carry, AttributeResolverInterface $item) => array_merge($carry, $item->resolve($className)),
            []
        );
    }
}
