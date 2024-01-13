<?php

namespace App\Components\Common\Dto\Market;

use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;

class MarketLoadParams
{
    public function __construct(
        private readonly Currency $currency,
        private readonly Timeframe $timeframe,
        private readonly DateTime $startTime,
        private readonly DateTime $endTime,
    ){}

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getTimeframe(): Timeframe
    {
        return $this->timeframe;
    }

    public function getStartTime(): DateTime
    {
        return $this->startTime;
    }

    public function getEndTime(): DateTime
    {
        return $this->endTime;
    }
}
