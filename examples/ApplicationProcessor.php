<?php

namespace Mbunge\PhpAttributes\Example;

/**
 * Application processor is aware of concrete environment like HTTP, CLI.
 *
 * Furthermore application processor is able to deal with frameworks
 * like DI-Containers, routers, event dispatches, API-Clients etc.
 *
 * Class ApplicationFacade
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example;
 */
interface ApplicationProcessor
{

    /**
     * @param ApplicationController $application
     * @return void
     */
    public function init(ApplicationController $application): void;

    /**
     * @param object $input
     * @return object
     */
    public function process(object $input): object;
}
