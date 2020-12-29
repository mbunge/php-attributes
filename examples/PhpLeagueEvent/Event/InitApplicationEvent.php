<?php

namespace Mbunge\PhpAttributes\Example\PhpLeagueEvent\Event;

use Mbunge\PhpAttributes\Example\ApplicationController;

/**
 * Class ExampleEvent
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example\PhpLeagueEvent\Events;
 */
class InitApplicationEvent
{
    public function __construct(public ApplicationController $application)
    {
    }
}
