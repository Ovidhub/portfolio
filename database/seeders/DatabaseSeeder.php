<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account. Credentials come from env so the real password is never
        // committed to the repo; defaults are used for local development.
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@example.com')],
            [
                'name' => 'Site Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
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
