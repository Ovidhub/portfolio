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
                'name' => 'Chidi Okeke',
                'role' => 'Founder, Lagos Retail Co.',
                'content' => 'Daniel built our online store and sales started coming in within the first week. The site is fast, easy to manage, and the Paystack checkout just works. Highly recommended.',
                'rating' => 5,
                'avatar' => 'CO',
                'color' => 'bg-purple-500',
            ],
            [
                'name' => 'Aisha Bello',
                'role' => 'CEO, BrightPath Consulting',
                'content' => 'Professional, responsive and genuinely skilled. Daniel delivered our web app on time and explained every step in language we could understand. A pleasure to work with.',
                'rating' => 5,
                'avatar' => 'AB',
                'color' => 'bg-blue-500',
            ],
            [
                'name' => 'Emeka Nwosu',
                'role' => 'Product Manager, FinStart',
                'content' => 'Our old website was slow and never showed up on Google. After Daniel rebuilt it, it loads instantly and we now rank for our main services. The difference has been huge.',
                'rating' => 5,
                'avatar' => 'EN',
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
