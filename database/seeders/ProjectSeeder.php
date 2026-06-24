<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Store with Paystack',
                'description' => 'A full-stack online store with secure Paystack checkout, product management and an admin dashboard, built for a growing Nigerian retail brand.',
                'body' => "A complete e-commerce platform built for a Nigerian retail business that wanted to sell online without relying on social media DMs. It features a fast product catalogue, cart, and a secure Paystack checkout that supports cards, bank transfers and USSD.\n\nThe storefront is a responsive React application, while the backend is a Laravel API handling orders, inventory and an admin dashboard for managing products and tracking sales. The whole site is optimised for speed and SEO so it ranks for the brand's products and loads quickly even on mobile data.",
                'tags' => ['React', 'Laravel', 'Paystack', 'MySQL'],
                'icon' => 'shopping-cart',
                'color' => 'from-purple-500 to-pink-500',
                'link' => '#',
                'github' => '#',
            ],
            [
                'title' => 'SaaS Booking & Scheduling App',
                'description' => 'A multi-tenant booking platform with real-time availability, automated reminders and online payments for service businesses.',
                'body' => "A software-as-a-service booking platform that lets salons, clinics and consultants take appointments online. Customers see real-time availability, book in a few taps, and receive automated email and WhatsApp reminders that cut down on no-shows.\n\nBuilt with Next.js and a Node.js API backed by PostgreSQL, the app supports multiple businesses (multi-tenancy), role-based access and subscription billing. Calendars sync in real time so two customers can never book the same slot.",
                'tags' => ['Next.js', 'Node.js', 'PostgreSQL', 'TypeScript'],
                'icon' => 'clipboard-list',
                'color' => 'from-blue-500 to-cyan-500',
                'link' => '#',
                'github' => '#',
            ],
            [
                'title' => 'Business Analytics Dashboard',
                'description' => 'An analytics dashboard that turns sales and marketing data into clear, interactive charts and exportable reports.',
                'body' => "An analytics dashboard that pulls data from a business's sales, payments and marketing tools into one clean, interactive view. Decision-makers can spot trends at a glance with charts powered by D3.js and filter by date range, product or channel.\n\nThe Express API aggregates and caches data in Redis for fast load times, and the React frontend offers customisable widgets and one-click report exports. It replaced a tangle of spreadsheets with a single source of truth.",
                'tags' => ['React', 'Express', 'D3.js', 'Redis'],
                'icon' => 'bar-chart',
                'color' => 'from-green-500 to-emerald-500',
                'link' => '#',
                'github' => '#',
            ],
            [
                'title' => 'Corporate Website & CMS',
                'description' => 'A fast, SEO-optimised company website with a custom content management system the team can update themselves.',
                'body' => "A modern marketing website for a Nigerian company that needed to look professional and rank on Google. It is server-rendered for SEO, scores highly on Core Web Vitals, and loads fast on every device.\n\nBuilt with Laravel and Blade, it ships with a simple custom CMS so the team can edit pages, publish blog posts and manage enquiries without touching code — exactly like the portfolio site you're viewing now.",
                'tags' => ['Laravel', 'Blade', 'Tailwind CSS', 'SEO'],
                'icon' => 'code',
                'color' => 'from-amber-500 to-orange-500',
                'link' => '#',
                'github' => '#',
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
