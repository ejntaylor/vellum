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
            ->hasCommand(VellumCommand::class);

        $this->mergeConfigFrom(__DIR__.'/../config/vellum.php', 'vellum');
    }

    public function packageRegistered()
    {
        Route::middleware(['web',config('vellum.middleware.auth')])->group(function () {
            Route::get('/vellum', [VellumController::class, 'index'])->name('vellum.index');
            Route::get('/vellum/posts/create', [VellumController::class, 'create']);
            Route::get('/vellum/posts/edit/{slug}', [VellumController::class, 'edit']);
            Route::post('/vellum/posts/update', [VellumController::class, 'store']);
            Route::get('/vellum/categories', [VellumController::class, 'categories']);
        });
    }
}
