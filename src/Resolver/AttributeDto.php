<?php

namespace Mbunge\PhpAttributes\Resolver;

use ReflectionAttribute;
use Reflector;

/**
 * Class AttributeDto
 * @package Mbunge\PhpAttributes\Resolver;
 */
final class AttributeDto
{
    public function __construct(
        private ReflectionAttribute $attribute,
        private Reflector $reflectedTarget
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
     * @return Reflector
     */
    public function getReflectedTarget(): Reflector
    {
        return $this->reflectedTarget;
    }
}
