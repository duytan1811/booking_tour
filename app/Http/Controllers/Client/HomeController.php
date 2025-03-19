<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tour_types = config('constants.tour_types');
        $special_tours = Tour::query()->where('is_outstanding', true)->take(4)->get();
        $blog_type = config('constants.blog_types');
        $tips = Blog::query()->where('type', 1)->take(2)->get();
        $sliders = Blog::query()->where('type', 3)->take(2)->get();
        $blogs = Blog::query()->where('type', 2)->orderBy('created_at','desc')->take(4)->get();

        return view('client.home.index', compact('tour_types', 'special_tours', 'tips', 'sliders','blogs'));
    }

    public function about()
    {
        return view('client.about.index');
    }
}
