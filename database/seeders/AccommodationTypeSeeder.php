<?php

namespace Database\Seeders;

use App\Models\AccommodationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccommodationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccommodationType::create([
            'type_name' => 'Hotel',
        ]);

        AccommodationType::create([
            'type_name' => 'Resort',
        ]);

        AccommodationType::create([
            'type_name' => 'Guest House',
        ]);

        AccommodationType::create([
            'type_name' => 'Villa',
        ]);
    }
}
