<?php

namespace App\Components\MarketLoader\Binance;

use App\Components\Common\Dto\Market\MarketLoadParams;
use App\Components\MarketApi\Contracts\MarketApiInterface;
use App\Components\MarketLoader\Contracts\BinanceMarketLoaderInterface;
use App\Components\MarketLoader\Stores\Contracts\Storable;
use App\Enum\Currency;

class MarketLoader implements BinanceMarketLoaderInterface
{
    private Storable $storable;

    public function __construct(
        private readonly MarketApiInterface $marketApi,
    ) {}

    public function setStorable(Storable $storable): void
    {
        $this->storable = $storable;
    }

    public function load(MarketLoadParams $marketLoadParams): array
    {
        $periodData = $this->marketApi->load($marketLoadParams);

        echo "<pre>";print_r($periodData);echo "</pre>";die;
    }

    public function resetCache(Currency $currency): void
    {
        $this->marketApi->resetCache($currency);
    }
}
