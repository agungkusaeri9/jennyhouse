<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(12);
        $product_categories = ProductCategory::withCount('products')->orderBy('name','ASC')->get();

        return view('frontend.pages.product.index',[
            'title' => 'All Product',
            'products' => $products,
            'product_categories' => $product_categories
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
