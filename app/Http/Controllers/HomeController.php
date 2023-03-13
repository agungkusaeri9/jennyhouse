<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home',[
            'title' => 'Jennyhouse',
            'posts' => Post::latest()->paginate(16),
            'products' => Product::latest()->limit(12)->get(),
            'product_banners' => Product::inRandomOrder()->limit(4)->get(),
            'product_categories' => ProductCategory::orderBy('name','ASC')->get(),
            'brands' => Brand::orderBy('name','ASC')->get()
        ]);
    }
}
