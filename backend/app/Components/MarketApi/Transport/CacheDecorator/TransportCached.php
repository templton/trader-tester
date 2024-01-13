<?php

namespace App\Components\MarketApi\Transport\CacheDecorator;

use App\Components\Common\Dto\Market\MarketLoadParams;
use App\Components\MarketApi\Transport\Contracts\TransportCachedInterface;
use App\Components\MarketApi\Transport\Contracts\TransportInterface;
use App\Enum\Currency;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Cache;

class TransportCached implements TransportCachedInterface
{
    private const CACHE_TTL = 432000;

    public function __construct(
        private readonly TransportInterface $transport,
        private readonly string             $cacheTagName,
    ) {}

    public function load(MarketLoadParams $marketLoadParams): array
    {
        $cacheKey = $this->createCacheKey($marketLoadParams);
        $callBack = fn() => $this->transport->load($marketLoadParams);

        return $this
            ->getTaggetCache($marketLoadParams->getCurrency())
            ->remember($cacheKey, self::CACHE_TTL, $callBack);
    }

    private function createCacheKey(MarketLoadParams $marketLoadParams): string
    {
        return (new ParamsToCacheKey())->createCacheKey($marketLoadParams);
    }

    public function resetCache(Currency $currency): void
    {
        $this->getTaggetCache($currency)->flush();
    }

    private function getTaggetCache(Currency $currency): Repository
    {
        return Cache::store('redis')->tags($this->cacheTagName . $currency->value);
    }
}
