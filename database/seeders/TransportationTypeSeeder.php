<?php

namespace Database\Seeders;

use App\Models\TransportationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransportationType::create([
            'type_name' => 'Bus',
        ]);

        TransportationType::create([
            'type_name' => 'Private Car',
        ]);

        TransportationType::create([
            'type_name' => 'Flight',
        ]);

        TransportationType::create([
            'type_name' => 'Train',
        ]);
    }
}
