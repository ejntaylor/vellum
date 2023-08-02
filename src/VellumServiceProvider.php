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
        Route::get('/vellum', [VellumController::class, 'dashboard']);
        Route::get('/vellum/posts', [VellumController::class, 'index'])->name('vellum.index');
        Route::get('/vellum/posts/create', [VellumController::class, 'create']);
        Route::get('/vellum/posts/edit/{slug}', [VellumController::class, 'edit']);
        Route::post('/vellum/posts/update', [VellumController::class, 'store']);
        Route::get('/vellum/categories', [VellumController::class, 'categories']);


//        Route::macro('vellum', function (string $baseUrl) {
//            Route::prefix($baseUrl)->group(function () {
//                Route::get('/', [VellumController::class, 'index']);
//            });
//        });
    }
}
