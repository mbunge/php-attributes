# PHP Attributes

<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/php-v/mbunge/php-attributes" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/dt/mbunge/php-attributes" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/v/mbunge/php-attributes" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/mbunge/php-attributes"><img src="https://img.shields.io/packagist/l/mbunge/php-attributes" alt="License"></a>

This package provides an easy way to use and apply [PHP 8 Attributes](https://www.php.net/manual/en/language.attributes.php) 
and allows quick real-world implementations meta-data or annotation related features like Routes, Events, DB Relations.

## Features
- Apply PHP 8 attributes to a class and class components
- Automatically apply attributes to autoloaded classes

See [Upcoming features](https://github.com/mbunge/php-attributes/issues?q=is%3Aissue+is%3Aopen+label%3A%22upcoming+feature%22) of next release.

## Concept

php-attributes uses a decorated composer autoloader and notifies a resolver with loaded class name.
The attributes for class components get resolved using reflections.

This package supports attributes for 

 - classes
 - class constants 
 - class methods 
 - class method parameters
 - class properties.

## Install

Via Composer

``` bash
$ composer require mbunge/php-attributes
```

## Usage

Instantiate the attribute resolver `Mbunge\PhpAttributes\AttributeResolver` via factory 
`PhpAttributes\PhpAttributesFactory::createResolver()` or direct.

Attributes of traget class components get resolved by passed class name as string 
to `Mbunge\PhpAttributes\Resolver\AttributeResolver::resolve(string $class)`.

All resolved attributes returned as an array of 
data-transfer object (dto) `Mbunge\PhpAttributes\Resolver\ResolvedAttributesDto`. 

```php
<?php

use Mbunge\PhpAttributes\PhpAttributesFactory;

// instantiate via factory
$resolver = (new PhpAttributesFactory())->createResolver();

// instantiate direct
$resolver = new Mbunge\PhpAttributes\AttributeResolver();

/** @var \Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto[] $result */
// vis string
$result = $resolver->resolve('\MyProject\MyClassWithAttributes');

// or via class name
$result = $resolver->resolve(\MyProject\MyClassWithAttributes::class);
```

### Automatically apply attributes to autoloaded classes

The libray provides a composer classloader decorator which extends composer autoloader with the ability 
to execute attribute resolver when class got autoloaded.

See also packaged [autoload](/autoload.php).

```php
<?php

use Composer\Autoload\ClassLoader;
use Mbunge\PhpAttributes\LoaderHandler;
use Mbunge\PhpAttributes\PhpAttributesFactory;

/** @var ClassLoader $loader */
$loader = require __DIR__ . '/vendor/autoload.php';

$factory = new PhpAttributesFactory();
$handler = new LoaderHandler($factory);

// optionally pass a resolver to handler
// You may add custom resolver behaviour or a custom resolver at this point
$resolver = $factory->createResolver();
$handler->setResolver($resolver);

return $handler->handle($loader);

// optionally avoid unregister of previous autoloader
// it is recommanded to keep only one autoloader, since previous autoloader will be unreachable
return $handler->handle($loader, false);
```

#### Use packaged autoload

Replace composer default autoload `/vendor/autoload` with packaged autoload `/vendor/mbunge/php-attributes/autoload.php`

The packed autoload applies all attributes to autoloaded classes. 

```php
<?php

require_once __DIR__ . '/vendor/mbunge/php-attributes/autoload.php';
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Deployment

Only maintainers are allowed to deploy new versions!

1. Run `composer run release` which will run tests and on success update changelog, package version and creates a release tag
2. switch to master branch and merge develop branch
3. Run `composer run deploy` which will run tests and on success push tags, master branch and develop branch

## Security

If you discover any security related issues, please email marco_bunge@web.de instead of using the issue tracker.

## Credits

- [Marco Bunge][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Further read

- In-depth PHP Attributes by stitcher.io: https://www.stitcher.io/blog/attributes-in-php-8

[link-author]: https://github.com/mbunge
[link-contributors]: ../../contributors
