<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(['id' => 1], [
            'name' => 'Alex Johnson',
            'title' => 'Web Developer',
            'location' => 'USA',
            'tagline' => 'Full-Stack Developer',
            'hero_intro' => "I'm an experienced Full-Stack Developer with 8+ years in the field, collaborating with various companies and startups to build amazing digital products.",
            'about_bio' => "I'm a passionate Full-Stack Developer with over 8 years of experience building digital products. My portfolio includes a diverse range of design and development projects. Each piece showcases my creativity, technical proficiency, and attention to detail. I highlight my ability to think outside the box and deliver exceptional results.",
            'hero_image' => null,
            'about_image' => null,
            'cv_path' => null,
            'stat_projects' => '150+',
            'stat_clients' => '80+',
            'stat_experience' => '8+',
            'email' => 'alex@devportfolio.com',
            'phone' => '+1 (555) 123-4567',
            'address' => 'San Francisco, CA, USA',
            'socials' => [
                ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com'],
                ['platform' => 'Twitter', 'url' => 'https://twitter.com'],
                ['platform' => 'GitHub', 'url' => 'https://github.com'],
                ['platform' => 'Dribbble', 'url' => 'https://dribbble.com'],
            ],
            'meta_title' => 'Alex Johnson — Web Developer & Full-Stack Engineer',
            'meta_description' => 'Alex Johnson is a full-stack web developer with 8+ years of experience building fast, scalable web applications, mobile apps, and APIs. View projects and get in touch.',
            'meta_keywords' => 'web developer, full-stack developer, react developer, laravel developer, freelance developer, portfolio',
            'og_image' => null,
        ]);
    }
}
