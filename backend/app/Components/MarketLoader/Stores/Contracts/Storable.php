<?php

namespace App\Components\MarketLoader\Stores\Contracts;

use App\Components\Common\Dto\Market\Candle;

interface Storable
{
    /**
     * @param Candle[] $candles
     */
    public function store(array $candles): void;
}
