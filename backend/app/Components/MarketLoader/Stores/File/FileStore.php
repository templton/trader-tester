<?php

namespace App\Components\MarketLoader\Stores\File;

use App\Components\MarketLoader\Stores\Contracts\FileStoreInterface;

class FileStore implements FileStoreInterface
{
    public function store(array $candles): void
    {
        echo "<pre>";print_r('STORE FILE HERE');echo "</pre>";die;
    }
}
