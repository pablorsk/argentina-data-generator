<?php

/**
 * Copyright (C) 1997-2018 Reyesoft <info@reyesoft.com>.
 *
 * This file is part of JsonApiPlayground. JsonApiPlayground can not be copied and/or
 * distributed without the express permission of Reyesoft
 */

declare(strict_types=1);

namespace Reyesoft\JsonApi;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * @codeCoverageIgnore
 */
class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('Faker', function($app) {
            $faker = \Faker\Factory::create();
            $faker->addProvider(\ArgentinaDataGenerator\CuitFakerProvider::class);
            return $faker;
        });
    }
}
