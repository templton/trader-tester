<?php

namespace App\Components\Math\Facades;

use Illuminate\Support\Facades\Facade;

class Math extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'math';
    }
}
