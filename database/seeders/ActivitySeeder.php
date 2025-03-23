<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            'name' => 'Hiking',
        ]);

        Activity::create([
            'name' => 'City Tour',
        ]);

        Activity::create([
            'name' => 'Beach Relaxation',
        ]);

        Activity::create([
            'name' => 'Cultural Experience',
        ]);
    }
}
