<?php

use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = factory(App\Pemilih::class, 10)->create();

        $faker = Faker\Factory::create();

        $pemilih = App\Pemilih::all();
        foreach ($pemilih as $row) {
            $rand = rand(0, 30);
            echo $row->id . PHP_EOL;
            for ($x = 0; $x <= $rand; $x++) {
                $row->alamat1 = $faker->secondaryAddress;
                $row->alamat2 = $faker->streetAddress;
                $row->poskod = $faker->postcode;
                $row->bandar = $faker->city;
                $row->kodNegeri = $faker->state;
                $row->save();
            }
        }
    }
}
