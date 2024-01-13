<?php

namespace App\Components\MarketLoader\Stores\Array;

use App\Components\MarketLoader\Stores\Contracts\ArrayStoreInterface;

class ArrayStore implements ArrayStoreInterface
{
    public function store(array $candles): void
    {
        echo "<pre>";print_r('STORE ARRAY HERE');echo "</pre>";die;
    }
}
