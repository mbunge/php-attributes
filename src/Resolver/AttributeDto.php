<?php

namespace Mbunge\PhpAttributes\Resolver;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;
use Reflector;

/**
 * Class AttributeDto
 * @package Mbunge\PhpAttributes\Resolver;
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
