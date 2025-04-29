<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('nl_BE');

        $continents = ['Africa', 'Asia', 'Europe', 'North America', 'South America', 'Australia', 'Antarctica'];
        $countries = ['United States', 'Japan', 'France', 'United Kingdom', 'Australia', 'Canada', 'Germany', 'Italy', 'Spain', 'Brazil'];

        $cities = [];
        for ($i = 0; $i < 20; $i++) {
            $cities[] = [
                'name' => $faker->city(),
                'country' => $faker->randomElement($countries),
                'continent' => $faker->randomElement($continents),
                'population' => $faker->numberBetween(100000, 10000000),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'known_for' => $faker->sentence(3, true),
                'founded_year' => $faker->year,
                'is_capital' => $faker->boolean(20), // 20% chance of being a capital
                'annual_tourists' => $faker->numberBetween(100000, 50000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('cities')->insert($cities);


    }
}
