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
                'title' => 'E-Commerce Platform',
                'description' => 'A full-stack e-commerce solution with React, Node.js, and Stripe integration.',
                'body' => "A complete e-commerce platform built from the ground up. It features a product catalog, shopping cart, secure Stripe checkout, order management, and an admin dashboard for inventory and analytics.\n\nThe frontend is a snappy React single-page app, while the backend is a Node.js/Express API backed by MongoDB. Real-time stock updates keep the storefront accurate, and the whole system is containerised with Docker for easy deployment.",
                'tags' => ['React', 'Node.js', 'MongoDB', 'Stripe'],
                'icon' => 'shopping-cart',
                'color' => 'from-purple-500 to-pink-500',
                'link' => '#',
                'github' => '#',
            ],
            [
                'title' => 'Task Management App',
                'description' => 'A collaborative task management tool with real-time updates and team features.',
                'body' => "A collaborative task manager that helps teams stay aligned. Boards, lists, and cards can be dragged and dropped, and every change is pushed to all connected clients instantly via WebSockets.\n\nBuilt with Next.js and TypeScript on the frontend, a PostgreSQL database for durable storage, and Socket.io for the real-time layer. Includes role-based permissions, comments, and activity history.",
                'tags' => ['Next.js', 'TypeScript', 'PostgreSQL', 'Socket.io'],
                'icon' => 'clipboard-list',
                'color' => 'from-blue-500 to-cyan-500',
                'link' => '#',
                'github' => '#',
            ],
            [
                'title' => 'Social Media Dashboard',
                'description' => 'Analytics dashboard for social media management with data visualization.',
                'body' => "An analytics dashboard that aggregates metrics across multiple social platforms into a single, beautiful view. Interactive charts powered by D3.js make trends easy to spot.\n\nThe Express backend collects and normalises data from various APIs, caching results in Redis for fast load times. The React frontend offers customisable widgets, date-range filtering, and exportable reports.",
                'tags' => ['React', 'D3.js', 'Express', 'Redis'],
                'icon' => 'bar-chart',
                'color' => 'from-green-500 to-emerald-500',
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
