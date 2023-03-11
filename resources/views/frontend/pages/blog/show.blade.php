@extends('frontend.layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>{{ $blog->title }}</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('blogs.index') }}">Blog</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ $blog->image() }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5  col-md-5">

                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{ $blog->title }}</h2>
                        {!! $blog->description !!}
                    </div>

                </div>
                <div class="navigation-area">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">

                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">


                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Catgories</h4>
                        <ul class="list cat-list">
                            @forelse ($blog_categories as $category)
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>{{ $category->name }}</p>
                                    <p>{{ $category->posts_count }}</p>
                                </a>
                            </li>
                            @empty

                            @endforelse
                        </ul>
                        <div class="br"></div>
                    </aside>


                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
