<?php

namespace App\Components\MarketApi;

use App\Components\MarketApi\Mappers\Binance\BinanceMapper;
use App\Components\MarketApi\Transport\Binance\BinanceTransport;

class MarketApiFactory
{
    public static function createBinance(): MarketApiInterface
    {
        return new MarketApi(new BinanceTransport(), new BinanceMapper());
    }
}
