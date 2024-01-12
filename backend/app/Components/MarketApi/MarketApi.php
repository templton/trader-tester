<?php

namespace App\Components\MarketApi;

use App\Components\MarketApi\Mappers\MapperInterface;
use App\Components\MarketApi\Transport\TransportInterface;
use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;

class MarketApi implements MarketApiInterface
{
    public function __construct(
        private readonly TransportInterface $transport,
        private readonly MapperInterface $mapper,
    ) {}

    public function load(Currency $currency, Timeframe $timeframe, DateTime $startTime, ?int $limit = null): array
    {
        $data = $this->transport->load($currency, $timeframe, $startTime, $limit);

        return array_map([$this->mapper, 'createCandle'], $data);
    }
}
