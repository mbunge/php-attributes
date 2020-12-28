<?php

namespace Mbunge\PhpAttributes;

/**
 * Interface AttributeResolverInterface
 * @package Mbunge\PhpAttributes
 */
interface AttributeResolverInterface
{
    public function resolve(string $className): void;
}
