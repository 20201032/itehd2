<?php

namespace Database\Seeders;

use App\Models\Trening;
use Illuminate\Database\Seeder;

class treninzi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++){
            Trening::create([
                'naziv' => $faker->sentence(1),
                'duzina' => rand(1,30),
                'tezina' => rand(1,10),
                'tipId' => rand(1,3)
            ]);
        }
    }
}
