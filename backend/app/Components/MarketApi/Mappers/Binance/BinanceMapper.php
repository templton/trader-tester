<?php

namespace app\Components\MarketApi\Mappers\Binance;

use App\Components\Common\Dto\Market\Candle;
use App\Components\MarketApi\Mappers\MapperInterface;
use DateTime;

class BinanceMapper implements MapperInterface
{
    public static function createCandle(array $data): Candle
    {
        $openTime = new DateTime();
        $openTime->setTimestamp(substr($data[0], 0, -3));

        $closeTime = new DateTime();
        $closeTime->setTimestamp(substr($data[6], 0, -3));

        return new Candle(
            $closeTime,
            $openTime,
            $data[1],
            $data[4],
            $data[3],
            $data[2],
        );
    }
}
