<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $product_categories = ProductCategory::withCount('products')->orderBy('name','ASC')->get();

        return view('frontend.pages.product.index',[
            'title' => 'All Product',
            'products' => $products,
            'product_categories' => $product_categories
        ]);
    }

    public function category($slug)
    {
        $products = Product::whereHas('category', function($q) use ($slug){
            $q->where('slug',$slug);
        })->with('category')->latest()->get();
        $category = ProductCategory::where('slug',$slug)->firstOrFail();
        $product_categories = ProductCategory::withCount('products')->orderBy('name','ASC')->get();

        return view('frontend.pages.product.index',[
            'title' => 'Kategori ' . $category->name,
            'products' => $products,
            'product_categories' => $product_categories,
            'category' => $category
        ]);
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug',$slug)->firstOrFail();
        return view('frontend.pages.product.show',[
            'title' => $product->name,
            'product' => $product,
        ]);
    }
}
