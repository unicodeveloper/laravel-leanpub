# laravel-leanpub

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-leanpub/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-leanpub)
[![License](https://poser.pugx.org/unicodeveloper/laravel-leanpub/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-leanpub.svg)](https://travis-ci.org/unicodeveloper/laravel-leanpub)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-leanpub.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-leanpub)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-leanpub.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-leanpub)

> Laravel 5 Package to work with Leanpub. Very easy to use. Offers the use of Facades and Dependency Injection

**Disclaimer:** Leanpub is a service of Ruboss Technology Corporation, a corporation incorporated in British Columbia, Canada. I self-publish a book
using their service, but am otherwise not affiliated with them in any way.

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

You'll need your book slug and API key values, both of which can be retrieved by [accessing your Leanpub account](https://leanpub.com/dashboard).

##### LeanpubManager

This is the class of most interest. It is bound to the ioc container as `'laravel-leanpub'` and can be accessed using the `Facades\Leanpub` facade.

##### Facades\Leanpub

This facade will dynamically pass static method calls to the `'laravel-leanpub'` object in the ioc container which by default is the `LeanpubManager` class.


##### Examples

Here you can see an example of just how simple this package is to use.

```php
use Unicodeveloper\Leanpub\Facades\Leanpub;
// or you can alias this in config/app.php like I mentioned initially above

Leanpub::getBook($book_slug)->id;
// e.g sample $book_slug is phptherightway returns 11146

Leanpub::getBook($book_slug)->about_the_book;
// e.g sample $book_slug is phptherightway returns

 <p><em>There is no canonical way to use PHP</em>. This website aims to introduce new PHP developers to some topics which they may not discover until it is too late, and aims to give seasoned pros some fresh ideas on those topics they’ve been doing for years without ever reconsidering. This ebook will also not tell you which tools to use, but instead offer suggestions for multiple options, when possible explaining the differences in approach and use-case.</p>\r\n
 <p>This is a living document and will continue to be updated with more helpful information and examples as they become available.</p>

Leanpub::getBook($book_slug)->title;
// e.g sample $book_slug is phptherightway returns PHP: The "Right" Way

Leanpub::getBook($book_slug)->total_copies_sold;
// e.g sample $book_slug is phptherightway returns 12056

Leanpub::getBook($book_slug)->word_count_published;
// e.g sample $book_slug is phptherightway returns 15849

Leanpub::getBook($book_slug)->author_string;
// e.g sample $book_slug is phptherightway returns "Phil Sturgeon and Josh Lockhart"

Leanpub::getBook($book_slug)->url;
// e.g sample $book_slug is phptherightway returns "http://leanpub.com/phptherightway"

Leanpub::getBook($book_slug)->title_page_url;
// e.g sample $book_slug is phptherightway returns "https://s3.amazonaws.com/titlepages.leanpub.com/phptherightway/original?1425544606"

Leanpub::getBook($book_slug)->minimum_price;
// e.g sample $book_slug is phptherightway returns 0.0

Leanpub::getBook($book_slug)->suggested_price;
// e.g sample $book_slug is phptherightway returns 0.0

Leanpub::getBook($book_slug)->image;
// e.g sample $book_slug is phptherightway returns "https://s3.amazonaws.com/titlepages.leanpub.com/phptherightway/medium?1425544606"

Leanpub::getBook($book_slug)->isFree;
// e.g sample $book_slug is phptherightway returns true

Leanpub::getBook($book_slug)->last_published_at;
// e.g sample $book_slug is phptherightway returns "2015-01-05T16:37:01Z"

Leanpub::getBook($book_slug)->meta_description;
// e.g sample $book_slug is phptherightway returns null

Leanpub::getBook($book_slug)->page_count_published;
// e.g sample $book_slug is phptherightway returns 70

Leanpub::getBook($book_slug)->subtitle;
// e.g sample $book_slug is phptherightway returns "Your guide to PHP best practices, coding standards,  and authoritative tutorials."

Leanpub::getBook($book_slug)->total_revenue;
// e.g sample $book_slug is phptherightway returns the price in revenue if the book is not free. For a book that is free like this, there is no `total_revenue` attribute

Leanpub::getBook($book_slug)->possible_reader_count;
// e.g sample $book_slug is phptherightway returns 12052
```


## TODO

Add wrappers for other API functionalities:

- All sales data
- Preview functions
- Publish functions
- Preview/publish job status
- Coupon management
- Testing

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