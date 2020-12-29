<?php

namespace Mbunge\PhpAttributes;

use Mbunge\PhpAttributes\Presenter\AttributePresenterInterface;
use Mbunge\PhpAttributes\Resolver\AttributeResolverInterface;

/**
 * Class AttributeHandler
 * @package Mbunge\PhpAttributes;
 */
final class AttributeHandler
{
    public function __construct(
        private AttributeResolverInterface $resolver,
        private AttributePresenterInterface $presenter
    )
    {
    }

    public function handle(string $className): mixed {
        $result = $this->resolver->resolve($className);

        return $this->presenter->present($result);
    }
}
