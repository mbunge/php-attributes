<?php

use Composer\Autoload\ClassLoader;
use PhpAttributes\PhpAttributesFactory;

/** @var ClassLoader $loader */
$loader = require __DIR__ . '/../vendor/autoload.php';

$decoratedAutoloader = (new PhpAttributesFactory())
    ->createComposerClassLoaderDecorator($loader);

$decoratedAutoloader->register(true);
$loader->unregister();

return $decoratedAutoloader;
