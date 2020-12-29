<?php

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\AttributeHandler;
use Mbunge\PhpAttributes\LoaderHandler;
use Mbunge\PhpAttributes\PhpAttributesFactory;
use Mbunge\PhpAttributes\Presenter\NullAttributePresenter;

/** @var ClassLoader $loader */
$loader = require __DIR__ . '/../vendor/autoload.php';
$attributeHandler = new AttributeHandler(
    (new PhpAttributesFactory())->createResolver(),
    new NullAttributePresenter()
);

$handler = new LoaderHandler($attributeHandler);
return $handler->handle($loader);
