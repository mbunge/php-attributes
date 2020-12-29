# Warm up classes and resolve attributes

In some cases, we are not able to wait for automatically resolve attributes from autoloaded classes.

For example, we need to listen to an event. 

```php
class AnyEventListener {
    #[ListenTo(Registered::class)]
    public function onRegistered(Registered $event) {
        // do something with event
    }
}
```

Usually we add those listeners to a configuration file, but we want to utilize attributes for automatically configure 
the listener.

## Problem

> TL;DR: Listners will not automatically register, without warm up.

Unfortunatilly the listener will never instantiated nor autoloaded, and we don't want to need to care about the listener
instatiation. Only event dispatcher should care about listeners, but they are not aware of those listerners, since they 
are not placed in any configuration file.

```php
<?php

// this will never execute AnyEventListener :(
$dispatcher->dispatch(new Registered());
```

## Solution

We need to perform a lookup, warm up those classes and resolve attributes. We present attributes to framework logic, 
for example registering listeners.

We utilize Composer classmaps. Configure class map for target folder e.g. `src/` in `composer.json`

```json
{
  "autoload": {
    "classmap": [
      "./src"
    ]
  }
}
```

We are now able to get class names and related files via `ClassLoader::getClassMap()`

```php
// load composer autoloader
/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require_once __DIR__ . '/vendor/autoload.php';

// get all classes from classmap
$classes = array_keys($loader->getClassMap()); 

// filter classmap for target source files
// e.g. in our project namespace App\
$warmupList = array_filter(
    $classes,
    fn(string $className) => str_starts_with($className, 'App\\')
);
```

We just need to configure and run attribute handler afterwards. For example automatically configure 
application event listeners via [EventAttributePresenter](../PhpLeagueEvent/EventAttributePresenter.php).

```php
<?php
use League\Event\EventDispatcher;
use Mbunge\PhpAttributes\AttributeHandler;
use Mbunge\PhpAttributes\Example\PhpLeagueEvent\EventAttributePresenter;
use Mbunge\PhpAttributes\PhpAttributesFactory;

// prepare event presenter for our example
$dispatcher = new EventDispatcher();
$presenter = new EventAttributePresenter($dispatcher);

// configure attribute handler with resolver and presenter
$factory = new PhpAttributesFactory();
$handler = new AttributeHandler(
    $factory->createResolver(),
    $presenter
);

// run attribute handler
// Our example: automatically register all event listeners
foreach($warmupList as $className) {
    // a configured presenter applies application logic
    // refer to \Mbunge\PhpAttributes\Example\PhpLeagueEvent\EventAttributePresenter as an example presenter
    $handler->handle($className);
}

// perform application logic and dispatch any event at some point
// AnyEventListener is executing ;)
$dispatcher->dispatch(new Registered());

```

This will also work with any other type of configuration like routes for any router, database relations, etc.
