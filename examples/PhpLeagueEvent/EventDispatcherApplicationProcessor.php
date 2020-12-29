<?php

namespace Mbunge\PhpAttributes\Example\PhpLeagueEvent;

use Mbunge\PhpAttributes\Example\ApplicationController;
use Mbunge\PhpAttributes\Example\ApplicationProcessor;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Event\HandleInputEvent;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Event\HandleOutputEvent;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Event\InitApplicationEvent;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * The processor dispatches events
 *
 * Class EventDispatcherApplicationFacade
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example\PhpLeagueEvent;
 */
class EventDispatcherApplicationProcessor implements ApplicationProcessor
{

    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private ApplicationController $controller
    )
    {
    }

    /**
     * @param ApplicationController $application
     */
    public function init(ApplicationController $application): void
    {
        $this->eventDispatcher->dispatch(new InitApplicationEvent($application));
    }

    /**
     * 1. delegates input to input event
     * 2. execute controller with input from input event
     * 3. delegate controller output to output event
     * @param object $input
     * @return object
     */
    public function process(object $input): object
    {
        /** @var HandleInputEvent $inputEvent */
        $inputEvent = $this->eventDispatcher->dispatch(new HandleInputEvent($input));

        $output = $this->controller->execute($inputEvent->input);

        /** @var HandleOutputEvent $outputEvent */
        $outputEvent = $this->eventDispatcher->dispatch(new HandleOutputEvent($output));
        return $outputEvent->output;
    }
}
