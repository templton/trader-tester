<?php

namespace App\Enum;

enum Timeframe: string
{
    case S1 = '1s';
    case H1 = '1h';
    case M1 = '1m';
    case D1 = '1d';
}
