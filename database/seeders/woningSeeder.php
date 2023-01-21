<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Faker\Factory as Faker;

class woningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('woning')->insert([
                'plaats' => 'lisserbroek',
                'straat' => 'lisserweg',
                'nr' => 586,
                'addition' => 'A'
                /*                'plaats' => $faker->city(),
                'straat' => $faker->streetName(),
                'nr' => $faker->randomDigit(),
                'addition' => $faker->streetSuffix()
                */
            ]);
        }
    }
}
