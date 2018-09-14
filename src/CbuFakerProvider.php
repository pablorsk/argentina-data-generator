<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataGenerator. ArgentinaDataGenerator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace ArgentinaDataGenerator;

use Faker\Provider\Base;

class CbuFakerProvider extends Base
{
    public static function cbu(): string
    {
        $A = random_int(1000000, 9999999); // 7
        $Ax = self::getChecksum($A);
        $B = random_int(1000000000000, 9999999999999);   // 13
        $Bx = self::getChecksum($B);

        return $A . $Ax . $B . $Bx;
    }

    private static function getChecksum(int $number): int
    {
        $value = (string) $number;
        $ponderador = [3, 1, 7, 9];
        $sum = 0;
        $j = 0;
        for ($i = strlen($value) - 1; $i >= 0; --$i) {
            $sum += ($value[$i] * $ponderador[$j % 4]);
            ++$j;
        }

        return (10 - $sum % 10) % 10;
    }
}
