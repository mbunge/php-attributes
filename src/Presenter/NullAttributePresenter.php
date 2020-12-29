<?php

namespace Mbunge\PhpAttributes\Presenter;

use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;

/**
 * Class NullPresenter
 * @package Mbunge\PhpAttributes\Presenter;
 */
class NullAttributePresenter implements AttributePresenterInterface
{

    /**
     * @param array $attributes
     * @return array
     */
    public function present(array $attributes): array
    {
        return $attributes;
    }
}
