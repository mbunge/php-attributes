<?php /** @noinspection ALL */

namespace PhpAttributes;

use Composer\Autoload\ClassLoader;
use PhpAttributes\ComposerClassLoaderDecorator;
use PhpAttributes\AttributeResolver;

/**
 * Class PhpAttributesFactory
 * @package PhpAttributes;
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
