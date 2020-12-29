<?php /** @noinspection ALL */

namespace Mbunge\PhpAttributes;

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\ComposerClassLoaderDecorator;
use Mbunge\PhpAttributes\Resolver\AttributeDtoMapper;
use Mbunge\PhpAttributes\Resolver\AttributeResolver;
use Mbunge\PhpAttributes\Resolver\AttributeResolverInterface;

/**
 * Class Mbunge\PhpAttributesFactory
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes;
 *
 * @since 1.0.0
 */
final class PhpAttributesFactory
{

    /**
     * @return AttributeResolverInterface
     */
    public function createResolver(): AttributeResolverInterface
    {
        return new AttributeResolver(new AttributeDtoMapper());
    }

}
