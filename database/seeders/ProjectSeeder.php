<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Live demo URLs ("link") and private-repo code links ("github") are left
        // as '#' so the UI doesn't render dead links. Update them in the admin panel
        // as projects are deployed or repositories are made public.
        $projects = [
            [
                'title' => 'Esusu — Digital Savings & Cooperative Platform',
                'description' => 'A digital esusu and cooperative savings platform that automates group contributions, scheduled payouts and member management for thrift groups.',
                'body' => "Esusu is a digital take on the traditional African rotating-savings scheme. Members join a savings group, contribute on a set schedule, and receive automated payouts in turn — all tracked transparently in one place.\n\nBuilt with Laravel and TypeScript, the platform handles member onboarding, contribution tracking, automated payout rotation, wallet balances and an admin dashboard for managing groups and reconciling payments. It replaces error-prone manual record-keeping with a secure, auditable system.",
                'tags' => ['Laravel', 'PHP', 'TypeScript', 'Fintech'],
                'icon' => 'database',
                'color' => 'from-emerald-500 to-teal-500',
                'link' => '#',
                'github' => '#', // private repo
            ],
            [
                'title' => 'Material Tools E-Commerce Store',
                'description' => 'A full e-commerce store for building materials and hardware tools, with a product catalogue, cart, secure checkout and an admin dashboard.',
                'body' => "An online store built for selling building materials and hardware tools. Customers browse a categorised catalogue, search products, manage a cart and check out securely, while the business manages stock and orders from an admin dashboard.\n\nThe frontend is built with TypeScript for a fast, type-safe experience, backed by a Laravel API for products, orders and inventory. It is fully responsive and optimised to perform well on mobile, where most shoppers browse.",
                'tags' => ['TypeScript', 'Laravel', 'Blade', 'E-Commerce'],
                'icon' => 'shopping-cart',
                'color' => 'from-purple-500 to-pink-500',
                'link' => '#',
                'github' => 'https://github.com/Ovidhub/Material-Tool-Ecommerce',
            ],
            [
                'title' => 'Hair Salon & Beauty Store',
                'description' => 'A modern online hair and beauty shop where customers can browse styles and products and place orders through a clean storefront.',
                'body' => "An e-commerce storefront for a hair salon and beauty brand. It showcases hairstyles, products and services with a clean, modern design that builds trust and encourages customers to buy online or get in touch.\n\nBuilt as a fast, responsive front-end, the site focuses on strong visual presentation and an easy browsing experience across phones, tablets and desktops.",
                'tags' => ['HTML', 'CSS', 'JavaScript', 'Responsive'],
                'icon' => 'palette',
                'color' => 'from-pink-500 to-rose-500',
                'link' => 'https://ovidhub.github.io/Hair-Salon/',
                'github' => 'https://github.com/Ovidhub/Hair-Salon',
            ],
            [
                'title' => 'Cleaning Service Website',
                'description' => 'A conversion-focused marketing website for a professional cleaning company, designed to showcase services and generate booking enquiries.',
                'body' => "A marketing website for a professional cleaning company. It presents the company's services, builds credibility and makes it easy for visitors to request a quote or book a cleaning.\n\nThe site is responsive and fast, with a clear layout and strong calls to action that guide visitors toward getting in touch.",
                'tags' => ['HTML', 'CSS', 'JavaScript', 'Web Design'],
                'icon' => 'layout',
                'color' => 'from-sky-500 to-blue-500',
                'link' => 'https://ovidhub.github.io/cleaning-Service/',
                'github' => 'https://github.com/Ovidhub/cleaning-Service',
            ],
            [
                'title' => 'RubiVest — Investment Platform',
                'description' => 'An investment platform where users register, fund accounts, choose plans and track their returns from a personal dashboard.',
                'body' => "RubiVest is an online investment platform that lets users sign up, fund their accounts, select investment plans and monitor their returns from a personal dashboard. An admin back office manages users, plans, deposits and withdrawals.\n\nBuilt with Laravel and PHP, it focuses on secure authentication, clear reporting and a smooth experience for managing investments online.",
                'tags' => ['Laravel', 'PHP', 'JavaScript', 'Fintech'],
                'icon' => 'bar-chart',
                'color' => 'from-amber-500 to-orange-500',
                'link' => '#',
                'github' => '#', // private repo
            ],
            [
                'title' => 'Corporate Company Profile Website',
                'description' => 'A professional company profile website presenting a business\'s services, portfolio and contact details with a polished, SEO-friendly design.',
                'body' => "A corporate website that presents a company's brand, services and portfolio in a professional, trustworthy way. It is structured for clarity and SEO so the business is easy to find and easy to contact.\n\nBuilt with a modern stack, it loads quickly, looks sharp on every device, and gives the company a strong online presence.",
                'tags' => ['Laravel', 'TypeScript', 'HTML', 'SEO'],
                'icon' => 'code',
                'color' => 'from-slate-600 to-slate-800',
                'link' => '#',
                'github' => 'https://github.com/Ovidhub/company-profile',
            ],
        ];

        foreach ($projects as $i => $project) {
            Project::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                array_merge($project, [
                    'slug' => Str::slug($project['title']),
                    'featured' => true,
                    'sort_order' => $i,
                ]),
            );
        }
    }
}
