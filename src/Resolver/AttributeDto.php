<?php

namespace Mbunge\PhpAttributes\Resolver;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;

/**
 * Class AttributeDto
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Resolver;
 * @since 2.0.0
 */
final class AttributeDto
{
    public function __construct(
        private ReflectionAttribute $attribute,
        private ReflectionClass|ReflectionClassConstant|ReflectionProperty|ReflectionMethod|ReflectionParameter $reflectedTarget
    )
    {
    }

    /**
     * @return ReflectionAttribute
     */
    public function getAttribute(): ReflectionAttribute
    {
        return $this->attribute;
    }

    /**
     * @return ReflectionClass|ReflectionClassConstant|ReflectionProperty|ReflectionMethod|ReflectionParameter
     */
    public function getReflectedTarget(): ReflectionClass|ReflectionClassConstant|ReflectionProperty|ReflectionMethod|ReflectionParameter
    {
        return $this->reflectedTarget;
    }
}
