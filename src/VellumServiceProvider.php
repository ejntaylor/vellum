<?php

namespace Ejntaylor\Vellum;

use Ejntaylor\Vellum\Http\Controllers\VellumController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ejntaylor\Vellum\Commands\VellumCommand;

class VellumServiceProvider extends PackageServiceProvider
{


    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'vellum');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../dist/css' => public_path('vendor/ejntaylor/vellum/css'),
            ], 'vellum-assets');
        }
    }

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

    public function packageRegistered()
    {
        Route::get('/vellum', [VellumController::class, 'index']);


//        Route::macro('vellum', function (string $baseUrl) {
//            Route::prefix($baseUrl)->group(function () {
//                Route::get('/', [VellumController::class, 'index']);
//            });
//        });
    }
}
