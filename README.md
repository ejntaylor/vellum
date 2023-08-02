# Vellum - Simple Blogging for Laravel (Powered by Folio)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ejntaylor/vellum.svg?style=flat-square)](https://packagist.org/packages/ejntaylor/vellum)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ejntaylor/vellum/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ejntaylor/vellum/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ejntaylor/vellum/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ejntaylor/vellum/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ejntaylor/vellum.svg?style=flat-square)](https://packagist.org/packages/ejntaylor/vellum)

This is a package providing a Simple UI for [Laravel Folio](http://github.com/laravel/folio) that provides a simple UI and Markdown editor for managing your blog content. View all your posts, create new ones, edit existing ones, and delete them.

<img width="1292" alt="image" src="https://github.com/ejntaylor/vellum/assets/2080025/bce3fc58-35d3-4f4e-aad3-383295b0460e">

<img width="1268" alt="image" src="https://github.com/ejntaylor/vellum/assets/2080025/8a2f518a-fb99-49b4-81c5-fc9f7e3aebf5">



## Installation

You can install the package via composer:

```bash
composer require ejntaylor/vellum
```

## Folio Installation

Folio is a required package so will be installed automatically. You will need to follow the instructions to install Folio.

Specifially, you will need to run the following commands:

```bash
php artisan folio:install
```

Until Folio is out of beta you will need to set the following in your composer.json file:

```bash
    "minimum-stability": "beta"
```



You will then need to publish the assets so we can style Vellum:

```bash
php artisan vendor:publish --tag="vellum-assets"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="vellum-config"

```

This is the contents of the published config file:

```php
return [
    'middleware' => [
        'auth' => \Ejntaylor\Vellum\Http\Middleware\AuthMiddleware::class,
    ],
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="vellum-views"
```

## Auth

You might already have Authentication setup. If you are starting with a fresh install you might want to use the Laravel Breeze package to get up and running quickly.

```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

## Usage

Install with the above instructions and make sure to publish the assets.

Make sure you have auth setup. 

Then head to https://yourapp.com/vellum to view the UI. Login and go - that's it!

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

I welcome all contributions - please submit a Pull Request and I'll review it as soon as I can.

## Security Vulnerabilities

Please get in touch to report security vulnerabilities.

## Credits

- [Elliot Taylor](https://github.com/ejntaylor)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
