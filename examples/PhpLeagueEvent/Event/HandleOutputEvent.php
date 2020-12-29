<?php

namespace Mbunge\PhpAttributes\Example\PhpLeagueEvent\Event;

/**
 * Class HandleInputEvent
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example\PhpLeagueEvent\Events;
 */
class HandleOutputEvent
{
    public function __construct(public object $output)
    {
    }

}
