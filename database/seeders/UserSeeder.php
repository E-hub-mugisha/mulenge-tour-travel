<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mulenge.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'staff',
            'email' => 'staff@mulenge.com',
            'password' => Hash::make('123456'),
            'role' => 'staff'
        ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer@mulenge.com',
            'password' => Hash::make('123456'),
            'role' => 'customer'
        ]);
    }
}
