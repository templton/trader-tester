<?php

namespace Tests\Unit;

use App\Components\MarketApi\Dto\Candle;
use app\Components\MarketApi\Mappers\Binance\BinanceMapper;
use PHPUnit\Framework\TestCase;

class BinanceMapperTest extends TestCase
{
    public function test_create_candle(): void
    {
        $data = [
            '1705017600000',
            '46339.16000000',
            '46515.53000000',
            '46012.80000000',
            '46293.43000000',
            '1773.38738000',
            '1705021199999',
            '82129970.65359740',
            '81858',
            '892.67142000',
            '41342772.35741430',
            '0',
        ];

        $candle = BinanceMapper::createCandle($data);

        $this->assertInstanceOf(Candle::class, $candle);
        $this->assertEquals($candle->getOpenTime()->getTimestamp(), substr($data[0], 0, -3), 'Open time');
        $this->assertEquals($candle->getCloseTime()->getTimestamp(), substr($data[6], 0, -3), 'Close time');
        $this->assertEquals($candle->getOpen(), $data[1], 'open');
        $this->assertEquals($candle->getClose(), $data[4], 'close');
        $this->assertEquals($candle->getLow(), $data[3], 'low');
        $this->assertEquals($candle->getHigh(), $data[2], 'high');
    }
}
