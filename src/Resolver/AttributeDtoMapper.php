<?php

namespace Mbunge\PhpAttributes\Resolver;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionException;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;
use function array_map;
use function array_merge;

/**
 * Collects reflections of attributes and target reflections
 * Class AttributeDtoCollector
 * @package Mbunge\PhpAttributes\Resolver;
 * @since 2.0.0
 */
final class AttributeDtoMapper
{

    /**
     * @param string $className
     * @return array
     * @throws ReflectionException
     */
    public function map(string $className): array
    {
        $ref = new ReflectionClass($className);

        return array_merge(
            $this->mapClassAttributes($ref),
            $this->mapConstantAttributes($ref),
            $this->mapPropertyAttributes($ref),
            $this->mapMethodAttributes($ref)
        );
    }

    private function mapClassAttributes(ReflectionClass $ref): array
    {
        return $this->mapAttributes($ref);
    }

    private function mapConstantAttributes(ReflectionClass $ref): array
    {
        $target = $ref->getReflectionConstants();
        return $this->flatMap($target);
    }

    private function mapPropertyAttributes(ReflectionClass $ref): array
    {
        $target = $ref->getProperties();
        return $this->flatMap($target);
    }

    private function mapMethodAttributes(ReflectionClass $ref): array
    {
        $target = $ref->getMethods();
        $mappedMethods = $this->flatMap($target);

        $mappedParameters = \array_map(
            fn($method) => $this->mapParameterAttributes($method),
            $target
        );

        return array_merge($mappedMethods, ...$mappedParameters);
    }

    private function mapParameterAttributes(ReflectionMethod $ref): array
    {
        $target = $ref->getParameters();
        return $this->flatMap($target);
    }

    /**
     * @param ReflectionClass|ReflectionClassConstant|ReflectionProperty|ReflectionMethod|ReflectionParameter $ref
     * @return AttributeDto[]
     */
    private function mapAttributes(
        ReflectionClass|ReflectionClassConstant|ReflectionProperty|ReflectionMethod|ReflectionParameter $ref
    ): array
    {
        return array_map(
            fn(ReflectionAttribute $attribute) => new AttributeDto(
                $attribute,
                $ref
            ),
            $ref->getAttributes()
        );
    }

    /**
     * @param array $target
     * @return array
     */
    private function flatMap(array $target): array
    {
        $mappedRef = \array_map(
            fn($specificRef) => $this->mapAttributes($specificRef),
            $target
        );

        return array_merge(...$mappedRef);
    }

}
