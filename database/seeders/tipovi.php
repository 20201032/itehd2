<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class tipovi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tip::create([
            'tip' => 'Cardio'
        ]);

        Tip::create([
            'tip' => 'Benchpress'
        ]);

        Tip::create([
            'tip' => 'Tegovi'
        ]);
    }
}
