<?php

namespace Mbunge\PhpAttributes;

use Composer\Autoload\ClassLoader;
use ReflectionException;

/**
 * Class ComposerAutoloaderDecorator
 * @package Mbunge\PhpAttributes;
 */
class ComposerClassLoaderDecorator
{

    public function __construct(
        private ClassLoader $loader,
        private AttributeResolverInterface $attributeResolver
    )
    {
    }

    /**
     * Call undecorated methods from class loader
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed
    {
        return call_user_func_array([$this->loader, $name], $arguments);
    }

    /**
     * Loads the given class or interface and apply attributes
     *
     * @param string $class The name of the class
     * @return bool|null True if loaded, null otherwise
     * @throws ReflectionException
     */
    public function loadClass(string $class): bool|null
    {
        if ($this->loader->loadClass($class)) {
            $this->attributeResolver->resolve($class);
            return true;
        }

        return null;
    }



    /**
     * Registers this instance as an autoloader.
     *
     * @param bool $prepend Whether to prepend the autoloader or not
     */
    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'loadClass'], true, $prepend);
    }

    /**
     * Unregisters this instance as an autoloader.
     */
    public function unregister()
    {
        spl_autoload_unregister([$this, 'loadClass']);
    }

}
