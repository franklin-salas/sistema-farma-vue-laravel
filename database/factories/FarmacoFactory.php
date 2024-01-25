<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->randomElement($array = array ('Amoxicilina','Penicilina','Azitromicina','Fluconazol','Clotrimazol','Ibuprofeno','Paracetamol')),
    ];
});
