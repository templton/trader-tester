<?php

namespace App\Components\Math\ServiceProviders;

use App\Components\Math\MathCalculator;
use Illuminate\Support\ServiceProvider;

class MathServiceProvider extends ServiceProvider
{
    protected bool $defer = true;

    public function register(): void
    {
        $this->app->singleton('math', fn($app) => new MathCalculator());
    }
}
