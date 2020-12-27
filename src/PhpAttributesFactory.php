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
    public function createComposerClassLoaderDecorator(ClassLoader $loader): ComposerClassLoaderDecorator
    {
        return new ComposerClassLoaderDecorator($loader, $this->createResolver());
    }

    /**
     * @return AttributeResolver
     */
    public function createResolver(): AttributeResolver
    {
        return new AttributeResolver();
    }

}
