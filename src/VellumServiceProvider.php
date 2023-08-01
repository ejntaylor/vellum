<?php

namespace Ejntaylor\Vellum;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ejntaylor\Vellum\Commands\VellumCommand;

class VellumServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('vellum')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_category_table')
            ->hasMigration('create_posts_table')
            ->hasCommand(VellumCommand::class);
    }
}
