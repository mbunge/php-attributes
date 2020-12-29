<?php

namespace Mbunge\PhpAttributes\Example\PhpLeagueEvent\Controller;

use Mbunge\PhpAttributes\Example\ApplicationController;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Attribute\SubscribeTo;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Event\InitApplicationEvent;

/**
 * Class ExampleListener
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example\PhpLeagueEvent;
 */
class DomainWithEventsController implements ApplicationController
{

    /**
     * @param InitApplicationEvent $event
     */
    #[SubscribeTo(InitApplicationEvent::class)]
    public function onInit(InitApplicationEvent $event) {
        echo 'Initiate application ' . get_class($event->application) . PHP_EOL;
    }

    public function execute(object $input): object
    {
        return $input;
    }
}
