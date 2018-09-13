# Argentina Data Generator

Generate CBU and CUIT/CUIL

## Installation

Add the CompanyNameGenerator™ library to your `composer.json` file:

    composer require pablorsk/argentina-data-generator --dev

## Usage

Use the new `ArgentinaDataGenerator\CuitFakerProvider` class in combination with [Faker](https://github.com/fzaninotto/Faker) to produce CUIT numbers.

    <?php
    $faker = Faker\Factory::create();
    $faker->addProvider(new \ArgentinaDataGenerator\CuitFakerProvider($faker));
    for ($i=0; $i < 5; $i++) {
        echo $faker->cuit, "\n";
    }
    
This snippet generates 5 awesome CUIT/CUIL valid numbers. Here is an example output from CuitFaker:

    20-48028763-1
    33-25497340-3
    33-35036407-8
    20-12145175-2
    33-37145386-0
    
## Generators

### \ArgentinaDataGenerator\CuitFakerProvider

    cuit        // 33-37145386-0
    cuitNumber  // 33371453860
    dni         // 37145386
