<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DestinationsSeeder::class,
            ActivitySeeder::class,
            AccommodationTypeSeeder::class,
            TransportationTypeSeeder::class,
            TourSeeder::class,
            // Add other seeders here
        ]);
    }
}
