<?php

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\LoaderHandler;
use Mbunge\PhpAttributes\PhpAttributesFactory;

/** @var ClassLoader $loader */
$loader = require __DIR__ . '/../vendor/autoload.php';

$handler = new LoaderHandler(new PhpAttributesFactory());
return $handler->handle($loader);
