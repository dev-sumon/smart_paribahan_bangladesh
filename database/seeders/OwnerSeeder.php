<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            'name' => 'Test Owner',
            'description' => 'Even before the arrival',
            'email' => 'owner@example.com',
            'phone' => '01772941135',
            'license_number' => 'P 688 CC',
            'password' => Hash::make('owner@example.com'),
            'status' => 1
        ]);
    }
}
