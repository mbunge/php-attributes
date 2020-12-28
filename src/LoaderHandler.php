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
    private AttributeResolverInterface $resolver;

    public function __construct(private PhpAttributesFactory $factory)
    {
        $this->setResolver($this->factory->createResolver());
    }

    /**
     * @param AttributeResolverInterface $resolver
     */
    public function setResolver(AttributeResolverInterface $resolver): void
    {
        $this->resolver = $resolver;
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
        $decoratedLoader = $this
            ->factory
            ->createComposerClassLoaderDecorator($loader, $this->resolver);

        $decoratedLoader->register(true);

        if ($unregisterPreviousLoader) {
            // it is recommanded to detach previous autoloader
            // previous autoloader will be unreachable
            $loader->unregister();
        }

        return $decoratedLoader;
    }

}
