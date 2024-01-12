<?php

namespace app\Components\MarketApi\Transport\Binance;

use App\Components\MarketApi\Transport\TransportInterface;
use App\Enum\Currency;
use App\Enum\Timeframe;
use DateTime;
use Illuminate\Support\Facades\Http;

class BinanceTransport implements TransportInterface
{
    private string $baseUrl = 'https://api.binance.com/api/v1';

    private const KLINES_LIMIT = 1500;

    public function load(Currency $currency, Timeframe $timeframe, DateTime $startTime, ?int $limit = null): array
    {
        $url = $this->baseUrl . '/klines';

        return $this->request($url, [
            'symbol' => $currency->value,
            'interval' => $timeframe->value,
            'startTime' => $startTime->getTimestamp() . '000',
            'limit' => $limit ?? self::KLINES_LIMIT,
        ]);
    }

    private function request(string $url, array $params): array
    {
        $response = Http::withQueryParameters($params)
            ->retry(3, 100)
            ->get($url);

        $response->throwUnlessStatus(200);

        return $response->json();
    }
}
