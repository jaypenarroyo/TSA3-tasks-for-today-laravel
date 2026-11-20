<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the single user record matching TSA1's schema.
     */
    public function run(): void
    {
        User::query()->delete();

        User::create([
            'username' => 'johnjames',
            'full_name' => 'John James',
            'email' => 'jpenarroyo53@gmail.com',
        ]);
    }
}
