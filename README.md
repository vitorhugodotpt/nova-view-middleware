# Laravel Nova View Middleware

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vitorhugodotpt/nova-view-middleware.svg?style=flat-square)](https://packagist.org/packages/vitorhugodotpt/nova-view-middleware)
[![Total Downloads](https://img.shields.io/packagist/dt/vitorhugodotpt/nova-view-middleware.svg?style=flat-square)](https://packagist.org/packages/vitorhugodotpt/nova-view-middleware)

Middleware to control visibility of index of one Resource in Laravel Nova

## Installation

You can install the package via composer:

```bash
composer require vitorhugodotpt/nova-view-middleware
```

## Usage
Add class to config > nova.php
````php
'middleware' => [
    ...
    \Vitorhugodotpt\NovaViewMiddleware\NovaViewMiddleware::class,
    ...
],
````


if you want to have the index resource available, even if the policy view is false.
``` php
public static $viewMiddleware = true;
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email vhugo@vitorhugo.pt instead of using the issue tracker.

## Credits

- [Vitor Hugo](https://github.com/vitorhugodotpt)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
