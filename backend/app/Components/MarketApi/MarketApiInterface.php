<?php

namespace App\Components\MarketApi;

use App\Components\MarketApi\Dto\Candle;
use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;

interface MarketApiInterface
{
    /**
     * @return Candle[] array
     */
    public function load(Currency $currency, Timeframe $timeframe, DateTime $startTime, ?int $limit = null): array;
}
