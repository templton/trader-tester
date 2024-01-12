<?php

namespace App\Components\Math\ServiceProviders;

use App\Components\Math\Calculator;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected bool $defer = true;

    public function register(): void
    {
        $this->app->singleton('math', fn($app) => new Calculator());
    }
}
