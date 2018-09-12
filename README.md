# Argentina Data Generator

Generate CBU and CUIT/CUIL

## Installation

Add the CompanyNameGenerator™ library to your `composer.json` file:

    composer require pablorsk/argentina-data-generator --dev

## Usage

Use the new `ArgentinaDataGenerator\CuitFakerProvider` class in combination with [Faker](https://github.com/fzaninotto/Faker) to produce CUIT numbers.

    <?php

    require __DIR__ .'/vendor/autoload.php';

    $faker = Faker\Factory::create();
    $faker->addProvider(new ArgentinaDataGenerator\CuitFakerProvider($faker));
    for ($i=0; $i < 20; $i++) {
        echo $faker->cuitNumber, "\n";
    }

This snippet generates 20 awesome CUIT/CUIL valid numbers. Here is an example output from CuitFaker:

    20-30540300-4
