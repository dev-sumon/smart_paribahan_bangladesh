<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create([
            'name' => 'Test Driver',
            'description' => 'Hellow I am driver. our experience 5 year this profession.',
            'designation' => 'member',
            'email' => 'driver@example.com',
            'phone' => '01772941135',
            'vehicles_license' => '111 BBC 2AC',
            'blood_group' => 'O+',
            'password' => Hash::make('driver@example.com'),
            'status' => 1
        ]);
    }
}
