<?php

namespace Mbunge\PhpAttributes;

/**
 * Interface AttributeResolverInterface
 * @package Mbunge\PhpAttributes
 *
 * @since 1.2.0
 */
interface AttributeResolverInterface
{
    public function resolve(string $className): void;
}
