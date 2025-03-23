<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a tour
        $tour = Tour::create([
            'name' => 'Summer Adventure',
            'description' => 'A fun-filled summer adventure with hiking and beach activities.',
            'price' => 499.99,
            'location' => 'Hawaii',
            'duration' => 7,
            'status' => 'active',
        ]);

        // Attach activities
        $tour->activities()->attach([1, 3]); // Hiking and Beach Relaxation

        // Attach accommodations
        $tour->accommodations()->attach([2, 4]); // Resort and Villa

        // Attach transportation
        $tour->transportation()->attach([1, 2]); // Bus and Private Car

        // Another tour
        $tour2 = Tour::create([
            'name' => 'City Exploration',
            'description' => 'A city tour with cultural experiences and city sightseeing.',
            'price' => 299.99,
            'location' => 'kigali',
            'duration' => 5,
            'status' => 'active',
        ]);

        // Attach activities
        $tour2->activities()->attach([2, 4]); // City Tour and Cultural Experience

        // Attach accommodations
        $tour2->accommodations()->attach([1, 3]); // Hotel and Guest House

        // Attach transportation
        $tour2->transportation()->attach([3, 4]); // Flight and Train
    }
}
