<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pemilih;
use Faker\Generator as Faker;

$factory->define(Pemilih::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'no_kp' => $faker->date('Ymd') . 'XX' . $faker->numberBetween(1000, 9999),
        'nama' => $faker->name,
        'jantina' => array_rand(['lelaki', 'perempuan']),
        'keturunan' => array_rand(['melayu', 'cina', 'india']),
        'agama' => array_rand(['islam', 'kristian', 'hindu']),
        'alamat1' => $faker->streetAddress,
        'alamat2' => $faker->secondaryAddress,
        'poskod' => $faker->postcode,
        'bandar' => $faker->city,
        'kodNegeri' => $faker->state,
    ];
});
