<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(['id' => 1], [
            'name' => 'Daniel Efegoma',
            'title' => 'Full-Stack Web Developer',
            'location' => 'Nigeria',
            'tagline' => 'Full-Stack Developer',
            'hero_intro' => "I'm a full-stack web developer based in Nigeria, helping businesses and startups build fast, secure and SEO-friendly websites and web applications that rank on Google and turn visitors into customers.",
            'about_bio' => "I'm Daniel Efegoma, a passionate full-stack web developer based in Nigeria with a strong focus on building modern, high-performing websites and web applications. I work with technologies like React, Next.js, Laravel and Node.js to deliver fast, secure and SEO-friendly digital products. From e-commerce stores to custom web apps and APIs, I help businesses and startups across Nigeria and beyond turn ideas into reliable software that drives real, measurable results.",
            'hero_image' => null,
            'about_image' => null,
            'cv_path' => null,
            'stat_projects' => '50+',
            'stat_clients' => '30+',
            'stat_experience' => '5+',
            'email' => 'ovidtech007@gmail.com',
            'phone' => null,
            'address' => 'Nigeria',
            'socials' => [
                ['platform' => 'GitHub', 'url' => 'https://github.com/Ovidhub'],
                ['platform' => 'LinkedIn', 'url' => 'https://www.linkedin.com/'],
                ['platform' => 'Twitter', 'url' => 'https://twitter.com/'],
                ['platform' => 'WhatsApp', 'url' => 'https://wa.me/'],
            ],
            'meta_title' => 'Daniel Efegoma — Full-Stack Web Developer in Nigeria',
            'meta_description' => 'Daniel Efegoma is a full-stack web developer in Nigeria building fast, SEO-friendly websites, web apps and APIs with React, Laravel and Node.js. Let\'s work together.',
            'meta_keywords' => 'web developer Nigeria, full-stack developer Nigeria, hire web developer Nigeria, React developer, Laravel developer, Node.js developer, freelance web developer, Daniel Efegoma, website developer, web app developer Nigeria',
            'og_image' => null,
        ]);
    }
}
