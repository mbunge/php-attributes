<?php

namespace Mbunge\PhpAttributes\Tests\Unit\Presenter;

use Mbunge\PhpAttributes\Presenter\NullAttributePresenter;
use Mbunge\PhpAttributes\Presenter\TypeGuardAttributePresenterInterfaceDecorator;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use Mbunge\PhpAttributes\Tests\TestStub;
use Mbunge\PhpAttributes\Tests\TestStubInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class TypeGuardAttributePresenterDecoratorTest
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Tests\Unit\Presenter
 */
class TypeGuardAttributePresenterDecoratorTest extends TestCase
{

    public function testPresentTypeGuardWithInterface()
    {
        $presenter = new NullAttributePresenter();
        $decoratedPresenter = new TypeGuardAttributePresenterInterfaceDecorator($presenter, TestStubInterface::class);
        $results = $decoratedPresenter->present([new \stdClass(), new TestStub()]);

        $this->assertCount(1, $results);
        $this->assertContainsOnlyInstancesOf(TestStubInterface::class, $results);
    }

    public function testPresentTypeGuardWithClass()
    {
        $presenter = new NullAttributePresenter();
        $decoratedPresenter = new TypeGuardAttributePresenterInterfaceDecorator($presenter, TestStub::class);
        $results = $decoratedPresenter->present([new \stdClass(), new TestStub()]);

        $this->assertCount(1, $results);
        $this->assertContainsOnlyInstancesOf(TestStub::class, $results);
    }

    public function testPresentFailWithInvalidType()
    {
        $this->expectException(\TypeError::class);
        $presenter = new NullAttributePresenter();
        new TypeGuardAttributePresenterInterfaceDecorator($presenter, 'blubbla123');
    }
}
