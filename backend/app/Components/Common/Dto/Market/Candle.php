<?php

namespace App\Components\Common\Dto\Market;

use DateTime;

class Candle
{
    public function __construct(
        private readonly DateTime $closeTime,
        private readonly DateTime $openTime,
        private readonly string $open,
        private readonly string $close,
        private readonly string $low,
        private readonly string $high,
    ){}

    public function getCloseTime(): DateTime
    {
        return $this->closeTime;
    }

    public function getOpenTime(): DateTime
    {
        return $this->openTime;
    }

    public function getOpen(): string
    {
        return $this->open;
    }

    public function getHigh(): string
    {
        return $this->high;
    }

    public function getLow(): string
    {
        return $this->low;
    }

    public function getClose(): string
    {
        return $this->close;
    }
}
