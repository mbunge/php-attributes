<?php

namespace Mbunge\PhpAttributes\Presenter;

use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;

/**
 * Interface AttributePresenter
 * @package Mbunge\PhpAttributes\Presenter
 */
interface AttributePresenterInterface
{
    /**
     * @param ResolvedAttributeDto[] $attributes
     * @return mixed
     */
    public function present(array $attributes): mixed;
}
