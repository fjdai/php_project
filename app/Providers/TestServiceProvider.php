<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TestService;
use App\Repositories\TestRepository;

class TestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TestService::class, function ($app) {
            return new TestService(new TestRepository());
        });
    }

    public function boot()
    {
        //
    }
}
