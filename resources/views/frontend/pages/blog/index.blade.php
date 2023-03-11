@extends('frontend.layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Blog Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('blogs.index') }}">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">


        <!--================Blog Categorie Area =================-->

        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                           @forelse ($blogs as $blog)
                           <article class="row blog_item">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{ $blog->image() }}" alt="">
                                    <div class="blog_details">
                                        <a href="{{ route('blogs.show',$blog->slug) }}">
                                            <h2>{{ $blog->title }}</h2>
                                        </a>
                                        <p>{{ $blog->meta_description }}</p>
                                        <a href="{{ route('blogs.show',$blog->slug) }}" class="white_bg_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                           @empty

                           @endforelse
                            {{-- <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-left"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                                    <li class="page-item"><a href="#" class="page-link">05</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-right"></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> --}}
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
    </section>
@endsection
