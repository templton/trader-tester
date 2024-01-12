<?php

namespace App\Components\MarketApi\Mappers;

use App\Components\MarketApi\Dto\Candle;

interface MapperInterface
{
    public static function createCandle(array $data): Candle;
}
