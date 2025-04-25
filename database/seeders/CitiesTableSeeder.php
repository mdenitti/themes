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
        // $cities = [
        //     [
        //         'name' => 'New York',
        //         'country' => 'United States',
        //         'continent' => 'North America',
        //         'population' => 8804190,
        //         'latitude' => 40.7128,
        //         'longitude' => -74.0060,
        //         'known_for' => 'Statue of Liberty, Times Square, Broadway',
        //         'founded_year' => 1624,
        //         'is_capital' => 0,
        //         'annual_tourists' => 65200000,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'Tokyo',
        //         'country' => 'Japan',
        //         'continent' => 'Asia',
        //         'population' => 13960000,
        //         'latitude' => 35.6762,
        //         'longitude' => 139.6503,
        //         'known_for' => 'Cherry blossoms, technology, Tokyo Tower',
        //         'founded_year' => 1457,
        //         'is_capital' => 1,
        //         'annual_tourists' => 14000000,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'Paris',
        //         'country' => 'France',
        //         'continent' => 'Europe',
        //         'population' => 2161000,
        //         'latitude' => 48.8566,
        //         'longitude' => 2.3522,
        //         'known_for' => 'Eiffel Tower, Louvre Museum, Notre-Dame',
        //         'founded_year' => 250,
        //         'is_capital' => 1,
        //         'annual_tourists' => 30000000,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'London',
        //         'country' => 'United Kingdom',
        //         'continent' => 'Europe',
        //         'population' => 8982000,
        //         'latitude' => 51.5074,
        //         'longitude' => -0.1278,
        //         'known_for' => 'Big Ben, Buckingham Palace, London Eye',
        //         'founded_year' => 43,
        //         'is_capital' => 1,
        //         'annual_tourists' => 21000000,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'Sydney',
        //         'country' => 'Australia',
        //         'continent' => 'Australia',
        //         'population' => 5312000,
        //         'latitude' => -33.8688,
        //         'longitude' => 151.2093,
        //         'known_for' => 'Sydney Opera House, Harbour Bridge, Bondi Beach',
        //         'founded_year' => 1788,
        //         'is_capital' => 0,
        //         'annual_tourists' => 4100000,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ];

        // DB::table('cities')->insert($cities);

        // $faker = Faker::create();

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
