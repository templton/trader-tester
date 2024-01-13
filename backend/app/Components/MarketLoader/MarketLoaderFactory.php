<?php

namespace App\Components\MarketLoader;

use App\Components\MarketApi\MarketApiFactory;
use App\Components\MarketLoader\Binance\MarketLoader;
use App\Components\MarketLoader\Contracts\MarketLoaderInterface;

class MarketLoaderFactory
{
    public function __construct(private readonly MarketApiFactory $marketApiFactory)
    {}

    public function createBinance(): MarketLoaderInterface
    {
        return new MarketLoader($this->marketApiFactory->createBinance());
    }
}
