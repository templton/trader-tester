<?php

namespace App\Components\MarketApi\ServiceProvider;

use App\Components\MarketApi\Contracts\BinanceMarketApiInterface;
use App\Components\MarketApi\Mappers\Binance\BinanceMapper;
use App\Components\MarketApi\MarketApi;
use App\Components\MarketApi\Transport\Binance\BinanceTransport;
use App\Components\MarketApi\Transport\CacheDecorator\TransportCached;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MarketApiServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->registerBinanceServiceProvider();
    }

    private function registerBinanceServiceProvider(): void
    {
        $transportCached = new TransportCached(new BinanceTransport(), 'binance');
        $mapper = new BinanceMapper();

        $this->app->bind(
            BinanceMarketApiInterface::class,
            fn($app) => new MarketApi($transportCached, $mapper),
        );
    }

    public function provides(): array
    {
        return [
            BinanceMarketApiInterface::class,
        ];
    }
}
