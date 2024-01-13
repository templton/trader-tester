<?php

namespace App\Components\MarketApi;

use App\Components\Common\Dto\Market\MarketLoadParams;
use App\Components\MarketApi\Contracts\MarketApiInterface;
use App\Components\MarketApi\Mappers\MapperInterface;
use App\Components\MarketApi\Transport\Contracts\TransportCachedInterface;
use App\Enum\Currency;

class MarketApi implements MarketApiInterface
{
    public function __construct(
        protected readonly TransportCachedInterface $transport,
        private readonly MapperInterface            $mapper,
    ) {}

    public function load(MarketLoadParams $marketLoadParams): array
    {
        $data = $this->transport->load($marketLoadParams);

        return array_map([$this->mapper, 'createCandle'], $data);
    }

    public function resetCache(Currency $currency): void
    {
        $this->transport->resetCache($currency);
    }
}
