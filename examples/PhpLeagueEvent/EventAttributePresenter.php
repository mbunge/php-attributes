<?php

namespace Mbunge\PhpAttributes\Example\PhpLeagueEvent;

use League\Event\ListenerRegistry;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Attribute\SubscribeTo;
use Mbunge\PhpAttributes\Presenter\AttributePresenterInterface;
use Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto;
use ReflectionException;
use ReflectionMethod;
use function array_filter;

/**
 * This presenters takes all matching SubscribeTo attribute instances
 * and registers events by SubscribeTo::name and it's reflection
 *
 * Class EventAttributePresenter
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example\PhpLeagueEvent;
 */
class EventAttributePresenter implements AttributePresenterInterface
{
    public function __construct(
        private ListenerRegistry $eventListenerRegistry
    )
    {
    }

    /**
     * Takes all matching attributes and register event listener
     *
     * @param array $attributes
     * @return array
     * @throws ReflectionException
     */
    public function present(array $attributes): array
    {
        // restrict to SubscribeTo instances
        $validAttributes = array_filter(
            $attributes,
            fn(ResolvedAttributeDto $dto) => $dto->getAttribute() instanceof SubscribeTo
                && $dto->getReflectedTarget() instanceof ReflectionMethod
        );

        // run matching attributes and register event listeners (subscriber)
        return array_map(
            fn(ResolvedAttributeDto $dto) => $this->registerListener($dto),
            $validAttributes
        );
    }

    /**
     * Takes event name from attribute and convert reflection to callable listener
     * @param ResolvedAttributeDto $dto
     * @return ResolvedAttributeDto
     * @throws ReflectionException
     */
    private function registerListener(ResolvedAttributeDto $dto): ResolvedAttributeDto {
        /** @var ReflectionMethod $reflection */
        $reflection = $dto->getReflectedTarget();
        /** @var SubscribeTo $attribute */
        $attribute = $dto->getAttribute();

        $this->eventListenerRegistry->subscribeTo(
            $attribute->event,
            [
                // could be replaced by psr-11 container::get to resolve dependecies
                $reflection->getDeclaringClass()->newInstanceWithoutConstructor(),
                $reflection->getName()
            ]
        );

        return $dto;
    }
}
