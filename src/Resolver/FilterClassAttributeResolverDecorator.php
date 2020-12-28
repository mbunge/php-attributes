<?php

namespace Mbunge\PhpAttributes\Resolver;

use Closure;

/**
 * Class FilterClassAttributeResolverDecorator
 * @package Mbunge\PhpAttributes\Resolver;
 */
class FilterClassAttributeResolverDecorator implements AttributeResolverInterface
{
    public function __construct(
        private AttributeResolverInterface $resolver,
        private Closure $filter
    )
    {
    }

    public function resolve(string $className): array
    {
        $result = $this->filter->__invoke($className);
        if ($result === true) {
            return $this->resolver->resolve($className);
        } else {
            return [];
        }
    }

}
