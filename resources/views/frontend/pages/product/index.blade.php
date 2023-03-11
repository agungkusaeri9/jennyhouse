@extends('frontend.layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Halaman Produk</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>

                        @isset($category)
                        <a href="{{ route('products.index') }}">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('products.category',$category->slug) }}">{{ $category->name }}</a>
                        @else
                        <a href="{{ route('products.index') }}">Shop</a>
                        @endisset
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Jennyhouse</div>
                    <ul class="main-categories">
                        <li class="main-nav-list"><a data-toggle="collapse" href="#product" aria-expanded="false"
                                aria-controls="product"><span class="lnr lnr-arrow-right"></span>Produk<span
                                    class="number">({{ $products->count() }})</span></a>
                            <ul class="collapse" id="product" data-toggle="collapse" aria-expanded="false"
                                aria-controls="fruitsVegetable">
                             @forelse ($product_categories as $category)
                             <li class="main-nav-list child"><a href="#">{{ $category->name }}<span
                                class="number">({{ $category->products_count }})</span></a></li>
                             @empty

                             @endforelse
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">

                    </div>
                    <div class="sorting mr-auto">

                    </div>
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#" class="active">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @forelse ($products as $product)
                            <!-- single product -->
                            <div class="col-lg-4 col-md-6">
                               <a href="{{ route('products.show',$product->slug) }}">
                                <div class="single-product">
                                    <img class="img-fluid" src="{{ $product->image() }}" alt="">
                                    <div class="product-details">
                                        <h6>{{ $product->name }}</h6>
                                        <div class="price">
                                            <h6>Rp. {{ number_format($product->price) }}/pcs</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Keranjang</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               </a>
                            </div>
                        @empty
                            <div class="col-12 my-3">
                                <p class="text-center">
                                    Produk Tidak Tersedia!
                                </p>
                            </div>
                        @endforelse
                    </div>
                </section>
                <!-- End Best Seller -->

            </div>
        </div>
    </div>
@endsection
