<?php

namespace App\Components\MarketLoader\ServiceProvider;

use App\Components\MarketApi\Contracts\BinanceMarketApiInterface;
use App\Components\MarketApi\ServiceProvider\MarketApiServiceNames;
use App\Components\MarketLoader\Binance\MarketLoader;
use App\Components\MarketLoader\Contracts\BinanceMarketLoaderInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\App;

class MarketLoaderServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->registerBinance();
    }

    private function registerBinance(): void
    {
        $binanceMarketApi = App::make(BinanceMarketApiInterface::class);
        $this->app->bind(BinanceMarketLoaderInterface::class, fn() => new MarketLoader($binanceMarketApi));
    }

    public function provides(): array
    {
        return [BinanceMarketApiInterface::class];
    }
}
