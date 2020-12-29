<?php

namespace Mbunge\PhpAttributes\Example;

/**
 * Application controller executes application logic
 *
 * Logic depend on field of use
 * - Front-Controller
 * - middleware handler
 * - use-case handler
 * - interactor handler
 *
 * Class ApplicationController
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example;
 */
interface ApplicationController
{
    public function execute(object $input): object;
}
