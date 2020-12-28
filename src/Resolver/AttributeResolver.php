<?php

namespace Mbunge\PhpAttributes\Resolver;

use ReflectionException;
use function array_filter;
use function array_map;

/**
 * Class AttributeResolver
 * @package Mbunge\PhpAttributes;
 *
 * @since 1.0.0
 */
class AttributeResolver implements AttributeResolverInterface
{
    public function __construct(
        private AttributeDtoMapper $mapper
    )
    {
    }

    /**
     * @param $className
     * @return ResolvedAttributeDto[]
     * @throws ReflectionException
     */
    public function resolve(string $className): array
    {
        $attributeDtoMap = $this->mapper->map($className);

        return $this->instantiate($attributeDtoMap);
    }

    /**
     * @param AttributeDto[] $attributes
     * @return array
     */
    private function instantiate(array $attributes): array
    {
        $validAttributes = array_filter(
            $attributes,
            fn(AttributeDto $dto) => class_exists($dto->getAttribute()->getName())
        );
        return array_map(
            fn(AttributeDto $dto) => new ResolvedAttributeDto(
                $dto->getAttribute()->newInstance(),
                $dto->getReflectedTarget()
            ),
            $validAttributes
        );
    }

}
