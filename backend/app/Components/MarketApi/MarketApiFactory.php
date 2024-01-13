<?php

namespace App\Components\MarketApi;

use App\Components\MarketApi\Mappers\Binance\BinanceMapper;
use App\Components\MarketApi\Transport\Binance\BinanceTransport;
use App\Components\MarketApi\Transport\CacheDecorator\TransportCached;
use App\Components\MarketApi\Transport\Contracts\TransportCachedInterface;
use App\Components\MarketApi\Transport\Contracts\TransportInterface;

class MarketApiFactory
{
    public function __construct(
        private readonly BinanceTransport $binanceTransport,
        private readonly BinanceMapper $binanceMapper,
    ) {}

    public function createBinance(): MarketApiInterface
    {
        return new MarketApi(
            $this->createTransportCached($this->binanceTransport, 'binance'),
            $this->binanceMapper,
        );
    }

    private function createTransportCached(TransportInterface $transport, string $cacheTag): TransportCachedInterface
    {
        return new TransportCached($transport, $cacheTag);
    }
}
