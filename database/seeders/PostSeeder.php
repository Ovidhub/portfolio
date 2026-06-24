<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'How Much Does It Cost to Build a Website in Nigeria?',
                'excerpt' => 'A clear, no-nonsense breakdown of what a professional website really costs in Nigeria in 2026 — and where your money actually goes.',
                'body' => "One of the first questions every business owner asks is: \"How much will my website cost?\" The honest answer is that it depends on what you need — but you deserve a clear breakdown instead of a vague quote.\n\nA simple, professional one-to-five page business website typically covers design, mobile responsiveness, basic SEO and a contact form. A more advanced site — an online store, a booking system or a web app — costs more because it involves payments, user accounts, dashboards and ongoing logic.\n\nThe biggest factors are: how many custom features you need, whether the design is bespoke or template-based, and whether you want a content management system so you can update the site yourself. Hosting and a domain are small recurring costs on top.\n\nMy advice: don't shop on price alone. A cheap site that is slow, insecure or invisible on Google costs you far more in lost customers than it saves. Invest in something fast, secure and built to grow with your business.",
                'cover_image' => 'https://images.pexels.com/photos/265087/pexels-photo-265087.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'published_at' => '2026-05-12 09:00:00',
            ],
            [
                'title' => 'Why Your Business Needs a Fast, SEO-Friendly Website',
                'excerpt' => 'Speed and SEO are not optional extras — they decide whether customers ever find you and whether they stay once they do.',
                'body' => "Most visitors decide whether to stay on a website within the first few seconds. If your pages are slow, they leave — and on mobile data, every extra second matters even more.\n\nSearch engine optimisation (SEO) is what makes your site show up when people search for your products or services. A beautiful website that no one can find is a missed opportunity. Good SEO starts with the basics: a fast, mobile-friendly site, clean URLs, descriptive page titles and content that answers what your customers are actually searching for.\n\nThis is why I build websites that are server-rendered, lightweight and structured for search engines from day one. The result is a site that loads quickly, ranks higher on Google, and turns more of your visitors into enquiries and sales.\n\nIf your current website is slow or buried on page five of Google, it is quietly costing you customers every single day.",
                'cover_image' => 'https://images.pexels.com/photos/270408/pexels-photo-270408.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'published_at' => '2026-04-03 09:00:00',
            ],
            [
                'title' => 'React vs Laravel: Choosing the Right Stack for Your Web App',
                'excerpt' => 'A plain-English guide to two of the most popular web technologies — and how to pick the right tool for your project.',
                'body' => "If you have spoken to a few developers, you have probably heard words like React, Laravel, Node.js and Next.js. Here is what they actually mean for your project, without the jargon.\n\nLaravel is a backend framework — it handles your data, business logic, payments and admin tools. It is excellent for content-driven sites, dashboards and applications that need to be reliable and SEO-friendly out of the box.\n\nReact (and Next.js) is a frontend technology for building rich, interactive interfaces. It shines when your app has a lot of real-time interaction, such as dashboards, chat, or complex forms.\n\nThe good news: you don't have to choose one or the other. Many of the best products combine a Laravel backend with a React frontend. As a full-stack developer, I help you pick the right combination based on your goals, budget and timeline — not on hype.",
                'cover_image' => 'https://images.pexels.com/photos/11035471/pexels-photo-11035471.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'published_at' => '2026-02-18 09:00:00',
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => Str::slug($post['title'])],
                array_merge($post, ['slug' => Str::slug($post['title'])]),
            );
        }
    }
}
