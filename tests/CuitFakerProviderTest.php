<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataGenerator. ArgentinaDataGenerator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace Tests;

use ArgentinaDataGenerator\CuitFakerProvider;
use PHPUnit\Framework\TestCase;

class CuitFakerProviderTest extends TestCase
{
    public function testCuit(): void
    {
        $generator = new CuitFakerProvider(\Faker\Factory::create());
        for ($i = 0; $i < 100; ++$i) {
            $this->assertRegExp('/[20|27|33]\-[0-9]{8}\-[0-9]/', $generator::cuit());
        }
    }

    public function testCuitNumber(): void
    {
        $generator = new CuitFakerProvider(\Faker\Factory::create());
        for ($i = 0; $i < 100; ++$i) {
            $cuit = $generator::cuitNumber();
            $this->assertTrue($this->isValidCuit($cuit), 'bad cuit: ' . $cuit);
        }
    }

    private function isValidCuit(int $number_cuit): bool
    {
        $cuit = (string) $number_cuit;

        if (strlen($cuit) !== 11) {
            return false;
        }

        $result = 0;
        for ($i = 0; $i <= 9; ++$i) {
            $result += $cuit[9 - $i] * (2 + ($i % 6));
        }

        $checksum = 11 - ($result % 11);
        $checksum = $checksum == 11 ? 0 : $checksum;

        return $checksum == $cuit[-1];
    }
}
