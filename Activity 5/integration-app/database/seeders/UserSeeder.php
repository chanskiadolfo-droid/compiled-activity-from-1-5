<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'chanskiadolfo@gmail.com'],
            [
                'name' => 'Chanski Adolfo',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'dream@gmail.com'],
            [
                'name' => 'Kyam Dryzen',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}
