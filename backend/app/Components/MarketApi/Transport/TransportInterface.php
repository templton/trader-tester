<?php

namespace App\Components\MarketApi\Transport;

use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;

interface TransportInterface
{
    public function load(Currency $currency, Timeframe $timeframe, DateTime $startTime, ?int $limit = null): array;
}
