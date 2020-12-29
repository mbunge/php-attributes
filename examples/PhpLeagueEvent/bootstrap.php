<?php
/**
 * @copyright Marco Bunge <marco_bunge@web.de>
 */
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

// use event dispatcher within attribute handler
$attributeHandler = new AttributeHandler(
    (new PhpAttributesFactory())->createResolver(),
    new EventAttributePresenter($eventDispatcher)
);

// initiate autoloader to deal with
// attributes from autoloaded classes
$handler = new LoaderHandler($attributeHandler);
$handler->handle($loader);

// controller subscriptes to init event with it's initiation
$controller = new DomainWithEventsController();

// initiate application with event dispatcher processor
$application = new Application(
    new EventDispatcherApplicationProcessor(
        $eventDispatcher,
        $controller
    )
);

// handle application input and process output
$output = $application->execute((object)['message' => 'Hello World']);

// present output
echo json_encode($output) . PHP_EOL;
