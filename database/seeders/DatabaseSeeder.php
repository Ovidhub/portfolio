<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account (credentials shown in README / after setup)
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Site Admin',
                'password' => Hash::make('password'),
            ],
        );

        $this->call([
            SiteSettingSeeder::class,
            ServiceSeeder::class,
            ToolSeeder::class,
            ProjectSeeder::class,
            PostSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
