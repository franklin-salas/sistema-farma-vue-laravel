<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->randomElement($array = array ('BAYER S.A.','INTI S.A.','IFA','PHARMA')),
    ];
});
