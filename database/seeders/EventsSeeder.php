<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('nl_BE');

        $locations = Location::all();

        $events = [];
        for ($i = 0; $i < 20; $i++) {
            $events[] = [
                'name' => $faker->sentence(3, true),
                'description' => $faker->paragraph(),
                'location_id' => $locations->random()->id,
                'date' => $faker->dateTimeBetween('now', '+1 year'),
                'time' => $faker->time(),
                'single' => $faker->boolean(20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('events')->insert($events);
    }
}
