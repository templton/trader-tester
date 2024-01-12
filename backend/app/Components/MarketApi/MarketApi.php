<?php

namespace App\Components\MarketApi;

use App\Components\MarketApi\Exceptions\MarketFactoryException;
use App\Components\MarketApi\Mappers\Binance\BinanceMapper;
use App\Components\MarketApi\Mappers\MapperInterface;
use App\Components\MarketApi\Transport\Binance\BinanceTransport;
use App\Components\MarketApi\Transport\TransportInterface;
use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;

class MarketApi implements MarketApiInterface
{
    public const SOURCE_BINANCE = 'binance';

    private MapperInterface $mapper;

    private TransportInterface $transport;

    public function __construct(string $sourceName)
    {
        $this->createApi($sourceName);
    }

    private function createApi(string $sourceName): void
    {
        switch ($sourceName) {
            case self::SOURCE_BINANCE:
                $this->mapper = new BinanceMapper();
                $this->transport = new BinanceTransport();
                break;
            default:
                throw new MarketFactoryException('Source ' . $sourceName . ' not exists');
        }
    }

    public function load(Currency $currency, Timeframe $timeframe, DateTime $startTime, ?int $limit = null): array
    {
        $data = $this->transport->load($currency, $timeframe, $startTime, $limit);

        return array_map(fn($item) => $this->mapper::createCandle($item), $data);
    }
}
