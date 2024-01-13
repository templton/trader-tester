<?php

namespace App\Components\MarketApi\Transport\CacheDecorator;

use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;

class ParamsToCacheKey
{
    public function createCacheKey(...$params): string
    {
        return
            collect($params[0])
                ->reject(fn($value) => empty($value))
                ->map(fn($value) => $this->valueToString($value))
                ->join('');
    }

    private function valueToString($value): string
    {
        return is_object($value) ? $this->objectToString($value) : $this->primitiveToString($value);
    }

    private function primitiveToString($value): string
    {
        return (string)$value;
    }

    private function objectToString($value): string
    {
        return match (get_class($value)) {
            Timeframe::class, Currency::class => $value->value,
            DateTime::class => $value->getTimestamp(),
            default => throw new \Exception('Unknown variable type = ' . get_class($value)),
        };
    }
}
