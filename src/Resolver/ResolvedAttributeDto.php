<?php

namespace Mbunge\PhpAttributes\Resolver;

use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;

/**
 * Class ResolvedAttributeDto
 * @package Mbunge\PhpAttributes\Resolver;
 */
final class ResolvedAttributeDto
{

    public function __construct(
        private object $attribute,
        private ReflectionClass|ReflectionClassConstant|ReflectionProperty|ReflectionMethod|ReflectionParameter $reflectedTarget
    )
    {
    }

    /**
     * @return object
     */
    public function getAttribute(): object
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
