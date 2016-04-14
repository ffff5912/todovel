<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ProjectService;
use App\Service\PhotoService;

class TodoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'App\Repository\ProjectRepositoryInterface',
            'App\Repository\ProjectRepository'
        );
        $this->app->singleton(
            'App\Repository\TaskRepositoryInterface',
            'App\Repository\TaskRepository'
        );
        $this->app->singleton(ProjectService::class, function ($app) {
            return new ProjectService($app['App\Repository\ProjectRepositoryInterface']);
        });
        $this->app->singleton(PhotoService::class, function ($app) {
            return new PhotoService();
        });
    }
}
