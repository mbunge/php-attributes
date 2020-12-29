<?php

namespace Mbunge\PhpAttributes\Tests;

/**
 * Class Test
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge;
 */
#[TestAttributeStub('class')]
class TestStub implements TestStubInterface
{
    #[TestAttributeStub('constant')]
    public const ANY = 'any';

    /**
     * @var string
     */
    #[TestAttributeStub('property')]
    public string $attr;

    /**
     * @param $attr
     */
    #[TestAttributeStub('method')]
    public function setAttr(#[TestAttributeStub('parameter')] $attr)
    {
        $this->attr = $attr;
    }

}
