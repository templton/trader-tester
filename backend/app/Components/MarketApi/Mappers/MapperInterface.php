<?php

namespace App\Components\MarketApi\Mappers;

use App\Components\Common\Dto\Market\Candle;

interface MapperInterface
{
    public static function createCandle(array $data): Candle;
}
