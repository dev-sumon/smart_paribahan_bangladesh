<?php

namespace Database\Seeders;

use App\Models\FieldWorker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldWorker::create([
            "title"=> "Test Field Worker",
            'email' => 'worker@example.com',
            'phone' => '0123456789',
            'nid' => '1234567890',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'address' => 'Test Address',
            'status' => 1,
            'password' => Hash::make('worker@example.com'),
        ]);
    }
}
