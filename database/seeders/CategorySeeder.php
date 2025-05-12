<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Adventure Travel'],
            ['name' => 'Cultural Tours'],
            ['name' => 'Wildlife & Nature'],
            ['name' => 'Eco-Tourism'],
            ['name' => 'Luxury Travel'],
            ['name' => 'Backpacking'],
            ['name' => 'Road Trips'],
            ['name' => 'Beach Holidays'],
            ['name' => 'Historical Sites'],
            ['name' => 'Travel Tips & Hacks'],
            ['name' => 'Family Vacations'],
            ['name' => 'Local Experiences'],
            ['name' => 'City Guides'],
            ['name' => 'Hiking & Trekking'],
            ['name' => 'Food & Culinary Tours'],
        ];

        foreach ($categories as &$category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
        }

        DB::table('categories')->insert($categories);
    }
}
