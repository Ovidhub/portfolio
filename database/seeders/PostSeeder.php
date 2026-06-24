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
                'title' => 'The Future of Web Development',
                'excerpt' => 'Exploring the latest trends in frontend frameworks and server-side rendering.',
                'body' => "Web development never stands still. In this post we look at where the industry is heading — from the resurgence of server-side rendering and the rise of edge computing, to the way AI tooling is reshaping how we write code.\n\nServer components, islands architecture, and resumable frameworks are blurring the line between server and client. Meanwhile, the platform itself keeps getting more capable, reducing our reliance on heavy JavaScript. The takeaway: ship less to the browser, render more on the server, and lean on the fundamentals.",
                'cover_image' => 'https://images.pexels.com/photos/1181675/pexels-photo-1181675.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'published_at' => '2023-10-15 09:00:00',
            ],
            [
                'title' => 'Mastering TypeScript',
                'excerpt' => 'Tips and tricks for writing type-safe code in large applications.',
                'body' => "TypeScript pays for itself the moment a codebase grows beyond a few files. This post collects practical patterns for keeping large applications maintainable: prefer discriminated unions over loose objects, lean on utility types, and let inference do the work instead of annotating everything.\n\nWe also cover stricter compiler options worth enabling, how to model API responses safely, and a few escape hatches to use sparingly. Good types are documentation that can't go out of date.",
                'cover_image' => 'https://images.pexels.com/photos/574071/pexels-photo-574071.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'published_at' => '2023-11-02 09:00:00',
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
