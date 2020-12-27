# PHP Attributes

<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/php-v/mbunge/php-attributes" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/dt/mbunge/php-attributes" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/v/mbunge/php-attributes" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/l/mbunge/php-attributes" alt="License"></a>

This package provides an easy way to use [php attributes](https://www.php.net/manual/en/language.attributes.php).

## Theory
PHP Attributes uses a decorated composer autoloader and automaticaly resolves PHP Attributes on classes using  
reflections. 

This package supports attributes for classes, class constants, class methods, method parameters and class propteries.

## Usage

### With composer autoloader

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

### Standalone

The attribute resolver could also be used as standalone implementation. 

Usage within an PSR-11 depenedency injection container is supported as well.

```
<?php

use PhpAttributes\PhpAttributesFactory;;

$resolver = (new PhpAttributesFactory())->createResolver();

§resolver->resolve('\MyProject\MyClassWithAttributes');

```

## Further read

- In-depth PHP Attributes by stitcher.io: https://www.stitcher.io/blog/attributes-in-php-8



