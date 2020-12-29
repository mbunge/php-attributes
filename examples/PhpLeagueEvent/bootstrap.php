<?php

use Composer\Autoload\ClassLoader;
use League\Event\EventDispatcher;
use Mbunge\PhpAttributes\AttributeHandler;
use Mbunge\PhpAttributes\Example\Application;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\Controller\DomainWithEventsController;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\EventAttributePresenter;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\EventDispatcherApplicationProcessor;
use Mbunge\PhpAttributes\LoaderHandler;
use Mbunge\PhpAttributes\PhpAttributesFactory;

/** @var ClassLoader $loader */
$loader = require __DIR__ . '/../../vendor/autoload.php';

$eventDispatcher = new EventDispatcher();

$attributeHandler = new AttributeHandler(
    (new PhpAttributesFactory())->createResolver(),
    new EventAttributePresenter($eventDispatcher)
);

$handler = new LoaderHandler($attributeHandler);
$handler->handle($loader);

$application = new Application(
    new EventDispatcherApplicationProcessor(
        $eventDispatcher,
        new DomainWithEventsController()
    )
);

$output = $application->execute((object)['message' => 'Hello World']);

var_dump($output);
