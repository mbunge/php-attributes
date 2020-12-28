<?php

namespace Mbunge\PhpAttributes;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

/**
 * Class AttributeResolver
 * @package Mbunge\PhpAttributes;
 *
 * @since 1.0.0
 */
class AttributeResolver implements AttributeResolverInterface
{

    /**
     * @param $className
     * @throws ReflectionException
     */
    public function resolve(string $className): void
    {
        $ref = new ReflectionClass($className);

        $this->applyClassAttributes($ref);
        $this->applyConstantAttributes($ref);
        $this->applyPropertyAttributes($ref);
        $this->applyMethodAttributes($ref);
    }

    private function applyClassAttributes(ReflectionClass $ref): void {
        $this->runAttributes($ref->getAttributes());
    }

    private function applyConstantAttributes(ReflectionClass $ref): void {
        foreach ($ref->getReflectionConstants() as $specificRef) {
            $this->runAttributes($specificRef->getAttributes());
        }
    }

    private function applyPropertyAttributes(ReflectionClass $ref): void {
        foreach ($ref->getProperties() as $specificRef) {
            $this->runAttributes($specificRef->getAttributes());
        }
    }

    private function applyMethodAttributes(ReflectionClass $ref): void {
        foreach ($ref->getMethods() as $specificRef) {
            $this->runAttributes($specificRef->getAttributes());
            $this->applyParameterAttributes($specificRef);
        }
    }

    private function applyParameterAttributes(ReflectionMethod $ref): void {
        foreach ($ref->getParameters() as $specificRef) {
            $this->runAttributes($specificRef->getAttributes());
        }
    }

    /**
     * @param array $attributes
     */
    public function runAttributes(array $attributes)
    {
        foreach ($attributes as $attribute) {
            $attribute->newInstance();
        }
    }

}
