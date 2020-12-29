<?php

/** @var ClassLoader $loader */

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\AttributeHandler;
use Mbunge\PhpAttributes\PhpAttributesFactory;
use Mbunge\PhpAttributes\Presenter\NullAttributePresenter;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;

$loader = require_once __DIR__ . '/../../vendor/autoload.php';

$attributeFactory = new PhpAttributesFactory();
$attributeHandler = new AttributeHandler(
    $attributeFactory->createResolver(),
    new NullAttributePresenter()
);

// Utilize classmap from composer to filter classes by namespace for warmup
// usually application specific classes
// ensure to configure composer.json:autoload.classmap
$warmupList = array_filter(
    array_keys($loader->getClassMap()),
    fn(string $className) => str_starts_with($className, 'Mbunge\PhpAttributes\Examples')
);

// iterate classes selected for warmup
// and resolve attributes
$attributesFound = array_merge(
    ...array_map(
        fn(string $class) => $attributeHandler->handle($class),
        $warmupList
    )
);

//
// Present found attributes
//

/**
 * @param $reflection
 * @return string
 */
function prettyReflectionName($reflection): string
{
    /** @var ReflectionMethod $reflection */
    return match (get_class($reflection)) {
        ReflectionMethod::class => $reflection->getDeclaringClass()->getName() . '::' . $reflection->getName(),
        default => $reflection->getName()
    };
}

$mapFn = fn(ResolvedAttributeDto $dto) => get_class($dto->getAttribute()) . ' -> ' . prettyReflectionName($dto->getReflectedTarget());

echo implode(PHP_EOL, array_map(
    $mapFn,
    $attributesFound
)) . PHP_EOL;
