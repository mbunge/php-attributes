<?php

namespace Mbunge\PhpAttributes\Resolver;

/**
 * Interface AttributeResolverInterface
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes
 *
 * @since 1.2.0
 */
interface AttributeResolverInterface
{
    public function resolve(string $className): array;
}
