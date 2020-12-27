# PHP Attributes

<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/php-v/mbunge/php-attributes" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/dt/mbunge/php-attributes" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/v/mbunge/php-attributes" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/l/mbunge/php-attributes" alt="License"></a>

This package provides an easy way to use php attributes.

## Usage

PHP Attributes decorates composer autoloader and automaticaly resolves PHP Attributes 
for classes, class constants, class methods, method parameters and class propteries.

The simpelst way is to exchange the composer autoloader

```php
<?php

require_once __DIR__ . '/vendor/autoload.php'
```

with the extened package autoloader

```php
<?php

require_once __DIR__ . '/vendor/mbunge/php-attributes/autoload.php'
```

Alternativiley use composer autoloader decorator like in /vendor/mbunge/php-attributes/autoload.php`:

```php
<?php

use Composer\Autoload\ClassLoader;
use PhpAttributes\PhpAttributesFactory;

/** @var ClassLoader $loader */
$loader = require __DIR__ . '/vendor/autoload.php';

$decoratedAutoloader = (new PhpAttributesFactory())
    ->createComposerClassLoaderDecorator($loader);

$decoratedAutoloader->register(true);
$loader->unregister();

return $decoratedAutoloader;
```

# Tests

Run tests with command as follows:

```
$ php bin/vendor/phpunit
```



