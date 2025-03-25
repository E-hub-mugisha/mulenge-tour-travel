<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or retrieve destinations
        $rwanda = Destination::firstOrCreate(['name' => 'Rwanda'], ['description' => 'The land of a thousand hills.']);
        $uganda = Destination::firstOrCreate(['name' => 'Uganda'], ['description' => 'The Pearl of Africa.']);
        $tanzania = Destination::firstOrCreate(['name' => 'Tanzania'], ['description' => 'Land of Serengeti and Zanzibar.']);
        $kenya = Destination::firstOrCreate(['name' => 'Kenya'], ['description' => 'Home of safaris and beaches.']);

        // Add hotels for Rwanda
        Hotel::create([
            'name' => 'Luxury Hotel Kigali',
            'description' => 'A 5-star hotel in Kigali with top amenities.',
            'price' => 200.00,
            'location' => 'Kigali',
            'total_rooms' => 100,
            'available_rooms' => 80,
            'rating' => 4.5,
            'address' => '123 Kigali Street, Kigali, Rwanda',
            'amenities' => 'Free WiFi, Pool, Gym, Spa',
            'check_in_time' => '14:00:00',
            'check_out_time' => '12:00:00',
            'images' => 'https://example.com/images/kigali.jpg',
            'hotel_type' => 'Hotel',
            'status' => 'active',
            'contact_number' => '+250 123 456 789',
            'email' => 'info@luxuryhotel.com',
            'website' => 'https://luxuryhotel.com',
            'destination_id' => $rwanda->id,
        ]);

        Hotel::create([
            'name' => 'Mountain Resort',
            'description' => 'A scenic resort in the hills of Rwanda.',
            'price' => 150.00,
            'location' => 'Rwanda',
            'total_rooms' => 50,
            'available_rooms' => 40,
            'rating' => 4.0,
            'address' => '456 Hill Resort Road, Rwanda',
            'amenities' => 'Restaurant, Hiking Trails, Free Breakfast',
            'check_in_time' => '15:00:00',
            'check_out_time' => '11:00:00',
            'images' => 'https://example.com/images/rwanda.jpg',
            'hotel_type' => 'Resort',
            'status' => 'active',
            'contact_number' => '+250 987 654 321',
            'email' => 'info@mountainresort.com',
            'website' => 'https://mountainresort.com',
            'destination_id' => $rwanda->id,
        ]);

        // Add hotels for Uganda
        Hotel::create([
            'name' => 'Safari Lodge Uganda',
            'description' => 'A luxury lodge located in the heart of Uganda\'s wildlife.',
            'price' => 180.00,
            'location' => 'Entebbe',
            'total_rooms' => 80,
            'available_rooms' => 60,
            'rating' => 4.7,
            'address' => '789 Wildlife Road, Entebbe, Uganda',
            'amenities' => 'Safari Tours, Free WiFi, Pool',
            'check_in_time' => '14:00:00',
            'check_out_time' => '12:00:00',
            'images' => 'https://example.com/images/entebbe.jpg',
            'hotel_type' => 'Lodge',
            'status' => 'active',
            'contact_number' => '+256 123 456 789',
            'email' => 'info@saferilodge.com',
            'website' => 'https://saferilodge.com',
            'destination_id' => $uganda->id,
        ]);

        Hotel::create([
            'name' => 'Lake Victoria Resort',
            'description' => 'A beautiful resort on the shores of Lake Victoria.',
            'price' => 120.00,
            'location' => 'Jinja',
            'total_rooms' => 60,
            'available_rooms' => 50,
            'rating' => 4.2,
            'address' => '101 Lakeside Road, Jinja, Uganda',
            'amenities' => 'Beach Access, Free Breakfast, Boating',
            'check_in_time' => '15:00:00',
            'check_out_time' => '11:00:00',
            'images' => 'https://example.com/images/jinja.jpg',
            'hotel_type' => 'Resort',
            'status' => 'active',
            'contact_number' => '+256 987 654 321',
            'email' => 'info@lakevictoriaresort.com',
            'website' => 'https://lakevictoriaresort.com',
            'destination_id' => $uganda->id,
        ]);

        // Add hotels for Tanzania
        Hotel::create([
            'name' => 'Serengeti Safari Lodge',
            'description' => 'A premium lodge located in the Serengeti National Park.',
            'price' => 250.00,
            'location' => 'Serengeti',
            'total_rooms' => 120,
            'available_rooms' => 100,
            'rating' => 4.8,
            'address' => '55 Safari Road, Serengeti, Tanzania',
            'amenities' => 'Safari Tours, Swimming Pool, Bar',
            'check_in_time' => '14:00:00',
            'check_out_time' => '12:00:00',
            'images' => 'https://example.com/images/serengeti.jpg',
            'hotel_type' => 'Lodge',
            'status' => 'active',
            'contact_number' => '+255 123 456 789',
            'email' => 'info@serengetilodge.com',
            'website' => 'https://serengetilodge.com',
            'destination_id' => $tanzania->id,
        ]);

        Hotel::create([
            'name' => 'Zanzibar Beach Resort',
            'description' => 'A beautiful beach resort located on Zanzibar Island.',
            'price' => 200.00,
            'location' => 'Zanzibar',
            'total_rooms' => 150,
            'available_rooms' => 130,
            'rating' => 4.6,
            'address' => '101 Beach Road, Zanzibar, Tanzania',
            'amenities' => 'Beach Access, Water Sports, Spa',
            'check_in_time' => '14:00:00',
            'check_out_time' => '12:00:00',
            'images' => 'https://example.com/images/zanzibar.jpg',
            'hotel_type' => 'Beach Resort',
            'status' => 'active',
            'contact_number' => '+255 987 654 321',
            'email' => 'info@zanzibarbeachresort.com',
            'website' => 'https://zanzibarbeachresort.com',
            'destination_id' => $tanzania->id,
        ]);

        // Add hotels for Kenya
        Hotel::create([
            'name' => 'Nairobi City Hotel',
            'description' => 'A modern hotel in the heart of Nairobi.',
            'price' => 130.00,
            'location' => 'Nairobi',
            'total_rooms' => 90,
            'available_rooms' => 70,
            'rating' => 4.4,
            'address' => '123 City Center, Nairobi, Kenya',
            'amenities' => 'Free WiFi, Conference Room, Restaurant',
            'check_in_time' => '14:00:00',
            'check_out_time' => '11:00:00',
            'images' => 'https://example.com/images/nairobi.jpg',
            'hotel_type' => 'Hotel',
            'status' => 'active',
            'contact_number' => '+254 123 456 789',
            'email' => 'info@nairobi.cityhotel.com',
            'website' => 'https://nairobi.cityhotel.com',
            'destination_id' => $kenya->id,
        ]);

        Hotel::create([
            'name' => 'Mombasa Beach Resort',
            'description' => 'A coastal resort offering beach activities and relaxation.',
            'price' => 160.00,
            'location' => 'Mombasa',
            'total_rooms' => 80,
            'available_rooms' => 60,
            'rating' => 4.7,
            'address' => '456 Coastal Road, Mombasa, Kenya',
            'amenities' => 'Beach Access, Diving, Spa',
            'check_in_time' => '15:00:00',
            'check_out_time' => '12:00:00',
            'images' => 'https://example.com/images/mombasa.jpg',
            'hotel_type' => 'Beach Resort',
            'status' => 'active',
            'contact_number' => '+254 987 654 321',
            'email' => 'info@mombasabeachresort.com',
            'website' => 'https://mombasabeachresort.com',
            'destination_id' => $kenya->id,
        ]);
    }
}
