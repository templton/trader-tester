<?php

namespace App\Components\MarketApi\Transport\Binance;

use App\Components\Common\Dto\Market\MarketLoadParams;
use App\Components\MarketApi\Transport\Contracts\TransportInterface;
use Illuminate\Support\Facades\Http;

class BinanceTransport implements TransportInterface
{
    private string $baseUrl = 'https://api.binance.com/api/v1';

    private const KLINES_LIMIT = 1500;

    public function load(MarketLoadParams $marketLoadParams): array
    {
        $url = $this->baseUrl . '/klines';

        return $this->request($url, [
            'symbol' => $marketLoadParams->getCurrency()->value,
            'interval' => $marketLoadParams->getTimeframe()->value,
            'startTime' => $marketLoadParams->getStartTime()->getTimestamp() . '000',
            'endTime' => $marketLoadParams->getEndTime()->getTimestamp() . '000',
        ]);
    }

    private function request(string $url, array $params): array
    {
        $params['limit'] = self::KLINES_LIMIT;

        $response = Http::withQueryParameters($params)
            ->retry(3, 100)
            ->get($url);

        $response->throwUnlessStatus(200);

        return $response->json();
    }
}
