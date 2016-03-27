<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }
}
