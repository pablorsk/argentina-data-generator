<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataGenerator. ArgentinaDataGenerator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace Tests;

use ArgentinaDataGenerator\CbuFakerProvider;
use PHPUnit\Framework\TestCase;

class CbuFakerProviderTest extends TestCase
{
    public function testCbu(): void
    {
        $generator = new CbuFakerProvider(\Faker\Factory::create());
        for ($i = 0; $i < 100; ++$i) {
            $cbu = $generator::cbu();
            $this->assertTrue(\Cbu::isValid($cbu), $cbu . ' not valid.');
        }
    }
}
