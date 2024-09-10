<?php

require 'vendor/autoload.php';  // Make sure to include the autoload file for FakerPHP

use Faker\Factory;

class Random
{
    public static function generatePerson()
    {
        $faker = Factory::create('en_PH');
        
        return [
            $faker->uuid,
            $faker->title,
            $faker->firstName,
            $faker->lastName,
            $faker->streetAddress,
            $faker->word,  // Barangay is represented as a random word
            $faker->city,
            $faker->state,
            $faker->country,
            $faker->phoneNumber,
            $faker->phoneNumber,
            $faker->company,
            $faker->url,
            $faker->jobTitle,
            $faker->colorName,
            $faker->date('Y-m-d'),
            $faker->email,
            $faker->password
        ];
    }
}
