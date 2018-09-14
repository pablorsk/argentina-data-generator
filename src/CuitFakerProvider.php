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

class CuitFakerProvider extends Base
{
    public static function dni(): int
    {
        return random_int(10000000, 99999999);
    }

    public static function cuitNumber(): int
    {
        return (int) str_replace('-', '', static::cuit());
    }

    public static function cuit(): string
    {
        $dni = (string) static::dni();
        $genders = ['male', 'female', 'society'];
        $gender = $genders[array_rand($genders, 1)];

        switch ($gender) {
            case 'male':
                $AB = '20';
                break;
            case 'female':
                $AB = '27';
                break;
            default:
                $AB = '33';
                break;
        }

        $calc = $AB[0] * 5 + $AB[1] * 4;

        $multipliers = [3, 2, 7, 6, 5, 4, 3, 2];
        for ($i = 0; $i < 8; ++$i) {
            $calc += $dni[$i] * $multipliers[$i];
        }

        $Z = 11 - ($calc % 11);

        // Si el resultado es 10, no existe, es un error. Se debe cambiar el tipo a 23 o 33 y recalcular.
        // Algunos algoritmos verifican erróneamente con 9 sin cambiar el tipo, lo cual es una falla de implementación.
        // source: https://es.wikipedia.org/wiki/Clave_%C3%9Anica_de_Identificaci%C3%B3n_Tributaria
        if ($Z === 10) {
            return static::cuit();
        }

        if ($Z === 11) {
            $Z = 0;
        }

        return $AB . '-' . $dni . '-' . $Z;
    }
}
