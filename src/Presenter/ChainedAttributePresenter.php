<?php

namespace Mbunge\PhpAttributes\Presenter;

use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use function array_filter;
use function array_reduce;

/**
 * Run multiple presenters and merge resolved results
 * Class ChainedAttributePresenter
 * @package Mbunge\PhpAttributes\Presenter;
 */
class ChainedAttributePresenter implements AttributePresenterInterface
{
    /**
     * ChainedAttributePresenter constructor.
     * @param AttributePresenterInterface[] $presenters
     */
    public function __construct(private array $presenters)
    {
    }

    /**
     * Presents attributes to presenter chain and returns presenter results
     * @param ResolvedAttributeDto[] $attributes
     * @return array
     */
    public function present(array $attributes): array
    {
        // filter resolver instances
        $presenters = array_filter($this->presenters, fn($resolver) => $resolver instanceof AttributePresenterInterface);
        return array_reduce(
            $presenters,
            fn(array $carry, AttributePresenterInterface $item) => array_merge($carry, [$item->present($attributes)]),
            []
        );
    }
}
