# laravel-leanpub

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-leanpub/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-leanpub)
[![License](https://poser.pugx.org/unicodeveloper/laravel-leanpub/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-leanpub.svg)](https://travis-ci.org/unicodeveloper/laravel-leanpub)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-leanpub.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-leanpub)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-leanpub.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-leanpub)

> Laravel 5 Package to work with Codepen. Very easy to use. Offers the use of Facades and Dependency Injection

## Installation

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

First, pull in the package through Composer.

``` bash
$ composer require unicodeveloper/laravel-leanpub
```

Another alternative is to simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/laravel-leanpub": "1.0.*"
```

Then run `composer install` or `composer update` to download it and have the autoloader updated.

Add this to your providers array in `config/app.php`

```php
// Laravel 5: config/app.php

'providers' => [
    ...
    Unicodeveloper\Leanpub\LeanpubServiceProvider::class,
    ...
];
```

This package also comes with a facade

```php
// Laravel 5: config/app.php

'aliases' => [
    ...
    'Codepen' => Unicodeveloper\Leanpub\Facades\Leanpub::class,
    ...
]
```

## Usage

##### CodepenManager

This is the class of most interest. It is bound to the ioc container as `'laravel-leanpub'` and can be accessed using the `Facades\Leanpub` facade.

##### Facades\Codepen

This facade will dynamically pass static method calls to the `'laravel-leanpub'` object in the ioc container which by default is the `LeanpubManager` class.

##### Examples

Here you can see an example of just how simple this package is to use.

```php
use Unicodeveloper\Leanpub\Facades\Leanpub;
// or you can alias this in config/app.php like I mentioned initially above
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit run
```

Alternatively, you can run the tests like so:

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Prosper Otemuyiwa](https://twitter.com/unicodeveloper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Security

If you discover any security related issues, please email [prosperotemuyiwa@gmail.com](prosperotemuyiwa@gmail.com) instead of using the issue tracker.