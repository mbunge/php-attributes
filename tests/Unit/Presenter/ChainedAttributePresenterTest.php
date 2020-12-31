<?php
/**
 * @copyright Marco Bunge <marco_bunge@web.de>
 */

namespace Mbunge\PhpAttributes\Tests\Unit\Presenter;

use Mbunge\PhpAttributes\Presenter\AttributePresenterInterface;
use Mbunge\PhpAttributes\Presenter\ChainedAttributePresenter;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use Mbunge\PhpAttributes\Tests\TestAttributeStub;
use Mbunge\PhpAttributes\Tests\TestStub;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class ChainedAttributePresenterTest
 * @package Mbunge\PhpAttributes\Tests\Unit\Presenter
 * @copyright Marco Bunge <marco_bunge@web.de>
 */
class ChainedAttributePresenterTest extends TestCase
{

    public function testPresent()
    {
        $dtoMock = new ResolvedAttributeDto(new TestAttributeStub('a'), new ReflectionClass(TestStub::class));
        $presenterMock = $this->createMock(AttributePresenterInterface::class);

        $presenterMock
            ->method('present')->willReturn($dtoMock);

        $presenters = [
            $presenterMock,
            $presenterMock
        ];

        $resolver = new ChainedAttributePresenter($presenters);
        $result = $resolver->present([$dtoMock]);

        $this->assertCount(2, $result);
        $this->assertContainsOnlyInstancesOf(ResolvedAttributeDto::class, $result);
    }
}
