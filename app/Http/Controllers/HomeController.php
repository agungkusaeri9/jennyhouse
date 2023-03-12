<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home',[
            'title' => 'Jennyhouse',
            'posts' => Post::latest()->paginate(16),
            'products' => Product::latest()->limit(12)->get()
        ]);
    }
}
