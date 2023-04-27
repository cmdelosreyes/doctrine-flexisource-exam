<?php

namespace Database\Factories;

use App\Entities\Customer;
use Faker\Generator;

$factory->define(Customer::class, function(Generator $faker) {
    return [
        'username'      => $faker->userName(),
        'firstName'     => $faker->firstName(),
        'lastName'      => $faker->lastName(),
        'email'         => $faker->email(),
        'country'       => $faker->country(),
        'gender'        => $faker->randomElement(['m', 'f']),
        'city'          => $faker->city(),
        'phoneNumber'   => $faker->phoneNumber()
    ];
});