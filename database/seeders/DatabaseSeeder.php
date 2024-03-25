<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'password' => '@dm1nGu3s7B00k',
            'email' => 'admin@example.com',
        ]);

        $this->call(RoomSeeder::class);
        $this->call(GuestBookSeeder::class);
    }
}
