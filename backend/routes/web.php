<?php

use App\Components\MarketApi\MarketApi;
use App\Enum\Currency;
use App\Enum\Timeframe;
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

    $api = new MarketApi(MarketApi::SOURCE_BINANCE);
    $res = $api->load(
        Currency::BTCUSDT,
        Timeframe::H1,
        DateTime::createFromFormat('Y-m-d H:i:s', '2024-01-12 00:00:00'),
    );

    echo "<pre>";print_r($res);echo "</pre>";die;

    return view('welcome');
});
