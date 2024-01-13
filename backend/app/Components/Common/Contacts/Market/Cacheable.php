<?php

namespace App\Components\Common\Contacts\Market;

use App\Enum\Currency;

interface Cacheable
{
    public function resetCache(Currency $currency): void;
}
