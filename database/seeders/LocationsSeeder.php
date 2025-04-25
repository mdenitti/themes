<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('nl_BE');

        $locations = [];
        for ($i = 0; $i < 20; $i++) {
            $locations[] = [
                'name' => $faker->sentence(2, true),
                'address' => $faker->address(),
                'capacity' => $faker->numberBetween(100, 1000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('locations')->insert($locations);
    }
}
