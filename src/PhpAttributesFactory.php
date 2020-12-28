<?php /** @noinspection ALL */

namespace Mbunge\PhpAttributes;

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\ComposerClassLoaderDecorator;
use Mbunge\PhpAttributes\Resolver\AttributeDtoMapper;
use Mbunge\PhpAttributes\Resolver\AttributeResolver;
use Mbunge\PhpAttributes\Resolver\AttributeResolverInterface;

/**
 * Class Mbunge\PhpAttributesFactory
 * @package Mbunge\PhpAttributes;
 *
 * @since 1.0.0
 */
final class PhpAttributesFactory
{

    /**
     * @param ClassLoader $loader
     * @return ComposerClassLoaderDecorator
     */
    public function createComposerClassLoaderDecorator(ClassLoader $loader, AttributeResolverInterface $resolver = null): ComposerClassLoaderDecorator
    {
        return new ComposerClassLoaderDecorator($loader, $resolver ?? $this->createResolver());
    }

    /**
     * @return AttributeResolverInterface
     */
    public function createResolver(): AttributeResolverInterface
    {
        return new AttributeResolver(new AttributeDtoMapper());
    }

}
