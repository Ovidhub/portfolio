<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['icon' => 'code', 'title' => 'Web Development', 'description' => 'Building fast, responsive, and scalable web applications using modern technologies like React, Next.js, and Node.js.'],
            ['icon' => 'smartphone', 'title' => 'Mobile Apps', 'description' => 'Creating cross-platform mobile applications with React Native that deliver native-like experiences on iOS and Android.'],
            ['icon' => 'layout', 'title' => 'UI/UX Design', 'description' => 'Designing intuitive and beautiful user interfaces with a focus on user experience and modern design principles.'],
            ['icon' => 'palette', 'title' => 'Brand Identity', 'description' => 'Crafting unique brand identities including logos, color schemes, and visual guidelines that make your brand stand out.'],
            ['icon' => 'code', 'title' => 'API Development', 'description' => 'Building robust RESTful and GraphQL APIs with proper authentication, rate limiting, and documentation.'],
            ['icon' => 'layout', 'title' => 'E-Commerce', 'description' => 'Developing complete e-commerce solutions with payment integration, inventory management, and analytics.'],
        ];

        foreach ($services as $i => $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                array_merge($service, ['sort_order' => $i]),
            );
        }
    }
}
