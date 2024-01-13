<?php

use App\Components\MarketApi\MarketApiCacheResettable;
use App\Components\MarketLoader\Contracts\BinanceMarketLoaderInterface;
use App\Components\MarketLoader\Facades\BinanceMarketLoaderFacade;
use App\Enum\Currency;
use App\Enum\Timeframe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $params = new \App\Components\Common\Dto\Market\MarketLoadParams(
        Currency::BTCUSDT,
        Timeframe::M1,
        DateTime::createFromFormat('Y-m-d H:i:s', '2023-12-01 00:00:00'),
        DateTime::createFromFormat('Y-m-d H:i:s', '2024-01-12 00:00:00'),
    );

    $fileStore = new \App\Components\MarketLoader\Stores\File\FileStore();

    $binanceLoader = App::make(BinanceMarketLoaderInterface::class);
//    $binanceLoader->resetCache(Currency::BTCUSDT);
    $binanceLoader->setStorable($fileStore);

    echo "<pre>";print_r($binanceLoader->load($params));echo "</pre>";die;

    return view('welcome');
});
