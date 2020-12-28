<?php /** @noinspection ALL */

namespace Mbunge\PhpAttributes;

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\ComposerClassLoaderDecorator;
use Mbunge\PhpAttributes\AttributeResolver;

/**
 * Class Mbunge\PhpAttributesFactory
 * @package Mbunge\PhpAttributes;
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
        return new AttributeResolver();
    }

}
