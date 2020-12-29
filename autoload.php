<?php
/**
 * @copyright Marco Bunge <marco_bunge@web.de>
 */
use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\AttributeHandler;
use Mbunge\PhpAttributes\LoaderHandler;
use Mbunge\PhpAttributes\PhpAttributesFactory;
use Mbunge\PhpAttributes\Presenter\NullAttributePresenter;

/** @var ClassLoader $loader */
/** @noinspection PhpIncludeInspection */
$loader = require __DIR__ . '/../../autoload.php';
$attributeHandler = new AttributeHandler(
    (new PhpAttributesFactory())->createResolver(),
    new NullAttributePresenter()
);

$handler = new LoaderHandler($attributeHandler);
return $handler->handle($loader);
