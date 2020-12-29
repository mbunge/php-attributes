<?php

namespace Mbunge\PhpAttributes\Presenter;

use function array_filter;
use function class_exists;

/**
 * Class TypeGuardAttributePresenterDecorator
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Presenter;
 */
class TypeGuardAttributePresenterInterfaceDecorator implements AttributePresenterInterface
{

    /**
     * TypeGuardAttributePresenterDecorator constructor.
     * @param AttributePresenterInterface $presenter
     * @param string $type
     */
    public function __construct(
        private AttributePresenterInterface $presenter,
        private string $type
    )
    {
        if (!$this->isValidType()) {
            throw new \TypeError('Expected type ' . $this->type . ' is not an exsiting class');
        }
    }

    public function present(array $attributes): array
    {
        return array_filter(
            $attributes,
            fn($attribute) => $attribute instanceof $this->type
        );
    }

    /**
     * @return bool
     */
    private function isValidType(): bool
    {
        return class_exists($this->type) || interface_exists($this->type);
    }
}
