<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::latest()->paginate(8);
        $blog_categories = PostCategory::withCount('posts')->orderBy('name','ASC')->get();

        return view('frontend.pages.blog.index',[
            'title' => 'Blog',
            'blogs' => $blogs,
            'blog_categories' => $blog_categories
        ]);
    }

    public function show($slug)
    {
        $blog = Post::where('slug',$slug)->firstOrFail();
        $blog_categories = PostCategory::withCount('posts')->orderBy('name','ASC')->get();
        return view('frontend.pages.blog.show',[
            'title' => $blog->title,
            'blog' => $blog,
            'blog_categories' => $blog_categories
        ]);
    }
}
