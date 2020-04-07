<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pemilih;
use Faker\Generator as Faker;

$factory->define(Pemilih::class, function (Faker $faker) {
    $agama = ['islam', 'kristian', 'hindu'];
    $bangsa = ['melayu', 'cina', 'india'];
    $jantina = ['lelaki', 'perempuan'];
    return [
        'id' => $faker->uuid,
        'no_kp' => $faker->date('Ymd') . 'XX' . $faker->numberBetween(1000, 9999),
        'nama' => $faker->name,
        'jantina' => $jantina[array_rand($jantina)],
        'keturunan' => $bangsa[array_rand($bangsa)],
        'agama' =>  $agama[array_rand($agama)],
        'alamat1' => $faker->streetAddress,
        'alamat2' => $faker->secondaryAddress,
        'poskod' => $faker->postcode,
        'bandar' => $faker->city,
        'kodNegeri' => $faker->state,
    ];
});
