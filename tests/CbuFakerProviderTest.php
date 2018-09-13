<?php
/**
 * Copyright (C) 1997-2018 Reyesoft <info@reyesoft.com>.
 *
 * This file is part of JsonApiPlayground. JsonApiPlayground can not be copied and/or
 * distributed without the express permission of Reyesoft
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
