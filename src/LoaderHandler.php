<?php

namespace Mbunge\PhpAttributes;

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\Resolver\AttributeResolverInterface;

/**
 * Class LoaderHandler
 * @package Mbunge\PhpAttributes;
 *
 * @since 1.2.0
 */
final class LoaderHandler
{

    public function __construct(private AttributeHandler $handler)
    {
    }

    /**
     * Handle autoloader
     *
     * It is recommanded detach previous autoloader, since previous autoloader will be unreachable
     *
     * @param ClassLoader $loader
     * @param bool $unregisterPreviousLoader optionally detach previous autoloader
     * @return ComposerClassLoaderDecorator
     */
    public function handle(ClassLoader $loader, bool $unregisterPreviousLoader = true): ComposerClassLoaderDecorator
    {
        $decoratedLoader = new ComposerClassLoaderDecorator($loader, $this->handler);

        $decoratedLoader->register(true);

        if ($unregisterPreviousLoader) {
            // it is recommanded to detach previous autoloader
            // previous autoloader will be unreachable
            $loader->unregister();
        }

        return $decoratedLoader;
    }

}
