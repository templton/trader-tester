<?php

namespace App\Components\Common\Contacts\Market;

use App\Components\Common\Dto\Market\Candle;
use App\Components\Common\Dto\Market\MarketLoadParams;

interface Loadable
{
    /**
     * @return Candle[] array
     */
    public function load(MarketLoadParams $marketLoadParams): array;
}
