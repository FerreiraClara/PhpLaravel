<?php

namespace Database\Seeders;

use App\Models\User;
use  \App\Models\Serie;
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
            'password' => bcrypt('123'),
        ]);

        \App\Models\Serie::factory(5)->create();

        \App\Models\Season::factory(10)->create();
    }
}
