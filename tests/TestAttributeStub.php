<?php

namespace Mbunge\PhpAttributes\Tests;

use Attribute;

/**
 * Class TestAttribute
 * @package Mbunge\PhpAttributes;
 */
#[Attribute]
class TestAttributeStub
{
    public static array $change = [];

    /**
     * TestAttribute constructor.
     * @param null $value
     */
    public function __construct($value = null)
    {
        self::$change[] = $value;
    }
}
