<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['icon' => 'code', 'title' => 'Web Development', 'description' => 'Custom, responsive websites and web applications built with React, Next.js, Laravel and Node.js — fast, secure and ready to scale with your business.'],
            ['icon' => 'layout', 'title' => 'E-Commerce Development', 'description' => 'Online stores with secure payments (Paystack, Flutterwave, Stripe), inventory management and analytics that turn browsers into paying customers.'],
            ['icon' => 'smartphone', 'title' => 'Mobile-First & PWA', 'description' => 'Mobile-first, progressive web apps that feel native on Android and iOS and load instantly, even on slower networks across Nigeria and Africa.'],
            ['icon' => 'code', 'title' => 'API Development', 'description' => 'Robust RESTful and GraphQL APIs with authentication, rate limiting and clear documentation to power your web and mobile products.'],
            ['icon' => 'palette', 'title' => 'SEO & Performance', 'description' => 'Technical SEO, Core Web Vitals and speed optimisation so your site ranks higher on Google and delivers a great user experience.'],
            ['icon' => 'layout', 'title' => 'UI/UX Design', 'description' => 'Clean, modern, conversion-focused interfaces designed around your users and your brand, from wireframes to a polished final product.'],
        ];

        foreach ($services as $i => $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                array_merge($service, ['sort_order' => $i]),
            );
        }
    }
}
