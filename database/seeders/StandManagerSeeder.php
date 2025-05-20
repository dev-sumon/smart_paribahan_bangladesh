<?php

namespace Database\Seeders;

use App\Models\StandManager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StandManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StandManager::create([
            'title'=> 'Test Manager',
            'slug'=> 'test-manager',
            'email'=> 'manager@example.com',
            'password' => Hash::make('manager@example.com'),
            'status' => 1
        ]);
    }
}
