<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::published()->latestFirst()->paginate(9),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->is_published, 404);

        return view('blog.show', [
            'post' => $post,
            'related' => Post::published()->where('id', '!=', $post->id)->latestFirst()->take(2)->get(),
        ]);
    }
}
