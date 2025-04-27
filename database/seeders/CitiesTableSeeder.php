<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
// use phpfaker
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create();

       $continents = ['Africa', 'Asia', 'Europe', 'North America', 'Oceania', 'South America'];
       $countries = ['USA', 'Canada', 'Mexico', 'UK', 'France', 'Germany', 'Italy', 'Spain', 'Australia', 'Japan'];

       $cities = [];

       for($i = 0; $i < 20; $i++) {
        $country = $faker->randomElement($countries);
        $continent = $faker->randomElement($continents);
        $isCapital = $faker->boolean(20); // 20% change of being a capital

        $cities[] = [
            'name' => $faker->bankAccountNumber(),
                'country' => $country,
                'continent' => $continent,
                'population' => $faker->numberBetween(100000, 20000000),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'known_for' => $faker->sentence(3, true),
                'founded_year' => $faker->numberBetween(100, 2000),
                'is_capital' => $isCapital,
                'annual_tourists' => $faker->numberBetween(500000, 70000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];

       }
       DB::table('cities')->insert($cities);
    }
}
