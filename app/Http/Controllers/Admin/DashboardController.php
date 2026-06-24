<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Project;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'postCount' => Post::count(),
            'testimonialCount' => Testimonial::count(),
            'messageCount' => ContactMessage::count(),
            'unreadCount' => ContactMessage::unread()->count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
