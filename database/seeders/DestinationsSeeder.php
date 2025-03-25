<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\DestinationLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to avoid constraint issues
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Destination::truncate();
        DestinationLocation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Rwanda
        $rwanda = Destination::create([
            'name' => 'Rwanda',
            'description' => 'The land of a thousand hills.',
            'image' => 'https://example.com/images/rwanda.jpg'
        ]);

        DestinationLocation::insert([
            [
                'destination_id' => $rwanda->id, 
                'name' => 'Akagera National Park', 
                'description' => 'Famous for its wildlife and safari experiences.',
                'images' => 'https://example.com/images/akagera.jpg'
            ],
            [
                'destination_id' => $rwanda->id, 
                'name' => 'Nyungwe National Park', 
                'description' => 'Home to beautiful rainforests and chimpanzees.',
                'images' => 'https://example.com/images/nyungwe.jpg'
            ],
            [
                'destination_id' => $rwanda->id, 
                'name' => 'Volcanoes National Park', 
                'description' => 'Known for mountain gorilla trekking.',
                'images' => 'https://example.com/images/volcanoes.jpg'
            ],
        ]);

        // Uganda
        $uganda = Destination::create([
            'name' => 'Uganda',
            'description' => 'The Pearl of Africa.',
            'image' => 'https://example.com/images/uganda.jpg'
        ]);

        DestinationLocation::insert([
            [
                'destination_id' => $uganda->id, 
                'name' => 'Bwindi Impenetrable Forest', 
                'description' => 'Famous for mountain gorilla trekking.',
                'images' => 'https://example.com/images/bwindi.jpg'
            ],
            [
                'destination_id' => $uganda->id, 
                'name' => 'Murchison Falls National Park', 
                'description' => 'Known for the powerful waterfalls and wildlife safaris.',
                'images' => 'https://example.com/images/murchison.jpg'
            ],
            [
                'destination_id' => $uganda->id, 
                'name' => 'Queen Elizabeth National Park', 
                'description' => 'Rich in biodiversity and tree-climbing lions.',
                'images' => 'https://example.com/images/queenelizabeth.jpg'
            ],
        ]);

        // Tanzania
        $tanzania = Destination::create([
            'name' => 'Tanzania',
            'description' => 'Home to Africa’s highest peak and largest game reserves.',
            'image' => 'https://example.com/images/tanzania.jpg'
        ]);

        DestinationLocation::insert([
            [
                'destination_id' => $tanzania->id, 
                'name' => 'Serengeti National Park', 
                'description' => 'Famous for the Great Migration and wildlife safaris.',
                'images' => 'https://example.com/images/serengeti.jpg'
            ],
            [
                'destination_id' => $tanzania->id, 
                'name' => 'Mount Kilimanjaro', 
                'description' => 'The tallest mountain in Africa and a top trekking destination.',
                'images' => 'https://example.com/images/kilimanjaro.jpg'
            ],
            [
                'destination_id' => $tanzania->id, 
                'name' => 'Zanzibar Beaches', 
                'description' => 'World-renowned white sandy beaches and crystal-clear waters.',
                'images' => 'https://example.com/images/zanzibar.jpg'
            ],
        ]);

        // Kenya
        $kenya = Destination::create([
            'name' => 'Kenya',
            'description' => 'A country of diverse landscapes and rich wildlife.',
            'image' => 'https://example.com/images/kenya.jpg'
        ]);

        DestinationLocation::insert([
            [
                'destination_id' => $kenya->id, 
                'name' => 'Maasai Mara National Reserve', 
                'description' => 'Famous for the Great Migration and Big Five safaris.',
                'images' => 'https://example.com/images/maasaimara.jpg'
            ],
            [
                'destination_id' => $kenya->id, 
                'name' => 'Amboseli National Park', 
                'description' => 'Known for large elephant herds and views of Mount Kilimanjaro.',
                'images' => 'https://example.com/images/amboseli.jpg'
            ],
            [
                'destination_id' => $kenya->id, 
                'name' => 'Lake Nakuru National Park', 
                'description' => 'Famous for flamingos and rhino conservation.',
                'images' => 'https://example.com/images/lakenakuru.jpg'
            ],
        ]);
    }
}
