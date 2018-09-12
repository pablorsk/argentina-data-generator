# Argentina Data Generator

Generate CBU and CUIT/CUIL

## Installation

Add the CompanyNameGenerator™ library to your `composer.json` file:

    composer require pablorsk/argentina-data-generator --dev

## Usage

### No framework

Use the new `ArgentinaDataGenerator\CuitFakerProvider` class in combination with [Faker](https://github.com/fzaninotto/Faker) to produce CUIT numbers.

    <?php

    require __DIR__ .'/vendor/autoload.php';

    $faker = Faker\Factory::create();
    $faker->addProvider(new ArgentinaDataGenerator\CuitFakerProvider($faker));
    for ($i=0; $i < 10; $i++) {
        echo $faker->cuit, "\n";
    }
    
This snippet generates 10 awesome CUIT/CUIL valid numbers. Here is an example output from CuitFaker:

    20-48028763-1
    33-25497340-3
    33-97699826-5
    33-35036407-8
    33-12214507-2
    20-12145175-2
    27-12620027-2
    20-46559872-8
    33-37145386-0
    
### Laravel

    php artisan make:provider FakerServiceProvider

And modify app/Providers/FakerServiceProvider.php

    <?php
    namespace App\Providers;
    
    use Illuminate\Support\ServiceProvider;
    
    class FakerServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton('Faker', function($app) {
                $faker = \Faker\Factory::create();
                $faker->addProvider(\ArgentinaDataGenerator\CuitFakerProvider::class);
                return $faker;
            });
        }
    }

