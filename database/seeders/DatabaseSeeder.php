<?php

namespace Database\Seeders;

use App\Models\StandManager;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            AdminSeeder::class,
        ]);
        $this->call([
            OwnerSeeder::class,
        ]);
        $this->call([
            DriverSeeder::class,
        ]);
        $this->call([
            FieldWorkerSeeder::class,
        ]);
        $this->call([
            StandManagerSeeder::class,
        ]);
    }
}
