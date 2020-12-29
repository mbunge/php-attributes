<?php

namespace Mbunge\PhpAttributes\Example\PhpLeagueEvent\Attribute;

use Attribute;

/**
 * Class SubscribeToAttribute
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example\PhpLeagueEvent;
 */
#[Attribute]
class SubscribeTo
{

    /**
     * SubscribeToAttribute constructor.
     * @param string $event
     */
    public function __construct(
        public string $event
    )
    {
    }
}
