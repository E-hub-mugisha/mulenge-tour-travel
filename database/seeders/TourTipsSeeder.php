<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\TourTip;

class TourTipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            [
                'title' => 'Exploring The Green Spaces Of Realar Residence Area Harmony with Nature',
                'slug' => Str::slug('Exploring The Green Spaces Of Realar Residence Area Harmony with Nature'),
                'content' => 'Welcome to Realar Residence, where sustainability meets comfort in every corner...',
                'images' => json_encode(['green-park.jpg', 'eco-living.jpg']),
                'read_time' => '5 mins Read',
                'author_id' => 2,
                'category_id' => 4, // Eco-Tourism
                'status' => 'pending',
            ],
            [
                'title' => 'Top 5 Hiking Trails to Explore This Summer',
                'slug' => Str::slug('Top 5 Hiking Trails to Explore This Summer'),
                'content' => 'Get your hiking boots ready! These 5 trails offer breathtaking views, wildlife encounters...',
                'images' => json_encode(['hike1.jpg', 'hike2.jpg']),
                'read_time' => '4 mins Read',
                'author_id' => 2,
                'category_id' => 4, // Hiking & Trekking
                'status' => 'published',
            ],
            [
                'title' => 'A Foodie’s Guide to Street Eats in Kigali',
                'slug' => Str::slug('A Foodie’s Guide to Street Eats in Kigali'),
                'content' => 'From grilled brochettes to spicy sambusas, Kigali’s street food scene is buzzing with flavor...',
                'images' => json_encode(['street-food.jpg']),
                'read_time' => '3 mins Read',
                'author_id' => 2,
                'category_id' => 4, // Food & Culinary Tours
                'status' => 'draft',
            ],
            [
                'title' => 'Cultural Gems: Museums Worth Visiting in Rwanda',
                'slug' => Str::slug('Cultural Gems: Museums Worth Visiting in Rwanda'),
                'content' => 'Discover the historical and artistic richness of Rwanda through its top museums...',
                'images' => json_encode(['museum1.jpg', 'culture-heritage.jpg']),
                'read_time' => '6 mins Read',
                'author_id' => 2,
                'category_id' => 2, // Cultural Tours
                'status' => 'published',
            ],
            [
                'title' => 'How to Pack Light for a 2-Week Trip',
                'slug' => Str::slug('How to Pack Light for a 2-Week Trip'),
                'content' => 'Packing doesn’t have to be stressful. Here are smart tips to help you pack light and travel smart...',
                'images' => json_encode(['packing.jpg']),
                'read_time' => '2 mins Read',
                'author_id' => 2,
                'category_id' => 10, // Travel Tips & Hacks
                'status' => 'pending',
            ],
            [
                'title' => 'Sunset Views You Can’t Miss in East Africa',
                'slug' => Str::slug('Sunset Views You Can’t Miss in East Africa'),
                'content' => 'Whether it’s the beaches of Zanzibar or the hills of Rwanda, these spots offer magical sunsets...',
                'images' => json_encode(['sunset1.jpg', 'sunset2.jpg']),
                'read_time' => '5 mins Read',
                'author_id' => 2,
                'category_id' => 3, // Wildlife & Nature
                'status' => 'published',
            ],
            [
                'title' => 'Eco-Friendly Travel Tips for the Conscious Explorer',
                'slug' => Str::slug('Eco-Friendly Travel Tips for the Conscious Explorer'),
                'content' => 'Make your adventures greener with these eco-friendly travel habits and choices...',
                'images' => json_encode(['eco-travel.jpg']),
                'read_time' => '4 mins Read',
                'author_id' => 2,
                'category_id' => 4, // Eco-Tourism
                'status' => 'draft',
            ],
        ];

        foreach ($tips as &$tip) {
            $tip['created_at'] = Carbon::now();
            $tip['updated_at'] = Carbon::now();
        }

        DB::table('tour_tips')->insert($tips);
    }
    
}
