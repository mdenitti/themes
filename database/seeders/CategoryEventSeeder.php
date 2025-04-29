<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        $categories = Category::all();
        $categoryEvents = [];
        foreach ($events as $event) {
            $randomCategories = $categories->random(rand(1, 3));
            foreach ($randomCategories as $category) {
                $categoryEvents[] = [
                    'event_id' => $event->id,
                    'category_id' => $category->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        // Insert the category_event records into the database
        DB::table('category_event')->insert($categoryEvents);
    }
}
