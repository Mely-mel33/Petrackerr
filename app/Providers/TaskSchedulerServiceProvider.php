<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\TaskScheduler;

class TaskSchedulerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::pushMiddlewareToGroup('web', TaskScheduler::class);

    }
}
