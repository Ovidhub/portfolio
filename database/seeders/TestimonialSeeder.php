<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Mitchell',
                'role' => 'CEO, TechStart Inc.',
                'content' => 'Alex delivered an exceptional e-commerce platform that exceeded our expectations. The attention to detail and technical expertise were outstanding.',
                'rating' => 5,
                'avatar' => 'SM',
                'color' => 'bg-purple-500',
            ],
            [
                'name' => 'Michael Chen',
                'role' => 'CTO, DataFlow Solutions',
                'content' => 'Working with Alex was a game-changer for our startup. Professional, communicative, and incredibly skilled at turning ideas into reality.',
                'rating' => 5,
                'avatar' => 'MC',
                'color' => 'bg-blue-500',
            ],
            [
                'name' => 'Emily Rodriguez',
                'role' => 'Founder, CreativeHub',
                'content' => 'A reliable developer who truly cares about the product. Our dashboard launched on time and our users love it.',
                'rating' => 5,
                'avatar' => 'ER',
                'color' => 'bg-emerald-500',
            ],
        ];

        foreach ($testimonials as $i => $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name']],
                array_merge($testimonial, ['sort_order' => $i]),
            );
        }
    }
}
