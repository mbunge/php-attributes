<?php

namespace Mbunge\PhpAttributes\Example;

/**
 * The Application acts as some kind of front controller and
 * uses an application processor.
 *
 * The application is not aware of concrete implementation details of processor
 *
 * Class Application
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpAttributes\Example;
 */
final class Application implements ApplicationController
{
    /**
     * Application constructor.
     * @param ApplicationProcessor $processor
     */
    public function __construct(
        private ApplicationProcessor $processor
    )
    {
        $this->processor->init($this);
    }

    /**
     * @param object $input
     * @return object
     */
    public function execute(object $input): object {
        return $this->processor->process($input);
    }

}
