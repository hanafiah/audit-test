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


        $total_row = 30000000;

        $chunk = 1000;
        $paging = $total_row / $chunk;
        /**
         * Generate pemilih
         */
        for ($x = 1; $x <= $paging; $x++) {
            echo "creating batch $x ++++++ " . ($x * $chunk) . PHP_EOL;
            factory(App\Pemilih::class, $chunk)->create();
        }

        $faker = Faker\Factory::create();

        /**
         * Simulate pemilih update their address
         * max 10 times
         */
        $i = 1;
        App\Pemilih::chunk(1000, function ($pemilih) use ($faker, $i) {
            echo '=======' . PHP_EOL;
            foreach ($pemilih as $row) {
                $rand = rand(0, 10);
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
        });
    }
}
