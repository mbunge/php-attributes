<?php

use Composer\Autoload\ClassLoader;
use PhpAttributes\PhpAttributesFactory;

/** @var ClassLoader $loader */
/** @noinspection PhpIncludeInspection */
$loader = require __DIR__ . '/../../autoload.php';

$decoratedAutoloader = (new PhpAttributesFactory())
    ->createComposerClassLoaderDecorator($loader);

$decoratedAutoloader->register(true);
$loader->unregister();

return $decoratedAutoloader;
