<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Tool;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'services' => Service::ordered()->get(),
            'tools' => Tool::ordered()->get(),
            'projects' => Project::ordered()->where('featured', true)->take(6)->get(),
            'posts' => Post::published()->latestFirst()->take(3)->get(),
            'testimonials' => Testimonial::ordered()->get(),
        ]);
    }
}
