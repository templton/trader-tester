<?php

namespace App\Components\Math;

class MathCalculator
{
    public static function setScale(int $scale): void
    {
        bcscale($scale);
    }

    public static function percent(string $val, string|int|float $percent): string
    {
        return bcdiv(bcmul($val, (string)$percent), '100');
    }

    public static function minMax(string $val1, string $val2): array
    {
        return bccomp($val1, $val2) === -1 ? [$val1, $val2] : [$val2, $val1];
    }

    public static function partPercent(string $val1, string $val2): string
    {
        [$min, $max] = self::minMax($val1, $val2);

        $deltaAbs = self::delta($val1, $val2);
        $upper = bcmul($deltaAbs, '100');

        return bcdiv($upper, $min);
    }

    public static function addPercent(string $val, string|int|float $percent): string
    {
        return bcadd($val, self::percent($val, (string)$percent));
    }

    public static function subPercent(string $val, string|int|float $percent): string
    {
        return bcsub($val, self::percent($val, (string)$percent));
    }

    public static function sub(string $val1, string $val2): string
    {
        return bcsub($val1, $val2);
    }

    public static function sum(string $val1, string $val2): string
    {
        return bcadd($val1, $val2);
    }

    public static function mul(string $val1, string $val2): string
    {
        return bcmul($val1, $val2);
    }

    public static function div(string $val1, string $val2): string
    {
        return bcdiv($val1, $val2);
    }

    public static function delta(string $val1, string $val2): string
    {
        [$min, $max] = self::minMax($val1, $val2);

        return bcsub($max, $min);
    }
}
