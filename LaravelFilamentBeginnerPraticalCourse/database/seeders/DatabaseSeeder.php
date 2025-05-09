<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Clara',
            'email' => 'clara@laravel-php.com',
            'password' => bcrypt('AbC123**'),
        ]);

        \App\Models\Property::factory(50)->create();

    }
}
