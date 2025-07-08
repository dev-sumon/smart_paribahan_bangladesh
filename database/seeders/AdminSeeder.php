<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'title' => 'Super Admin',
            'nid' => '0000000000',
            'father_name' => 'Test Father',
            'mother_name' => 'Test Mother',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin@example.com'),
            'status' => 1
        ]); 
    }
}
