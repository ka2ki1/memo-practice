<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User は MemoSeeder 側で作るので、ここでは作らない
        $this->call(MemoSeeder::class);
    }
}
