@extends('frontend.layouts.app')
@section('content')
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        @forelse ($product_banners as $banner)
                            <div class="row single-slide align-items-center d-flex">
                                <div class="col-lg-5 col-md-6">
                                    <div class="banner-content">
                                        <h1>{{ $banner->name }}</h1>
                                        <p>{{ $banner->meta_description }}</p>
                                        {{-- <div class="add-bag d-flex align-items-center">
                                            <a class="add-btn" href="cart.html"><span class="lnr lnr-cross"></span></a>
                                            <span class="add-text text-uppercase">Add to Bag</span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="banner-img">
                                        <img class="img-fluid" src="{{ asset('assets/frontend/img/banner/banner.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/frontend/img/features/f-icon1.png') }}" alt="">
                        </div>
                        <h6>Pengiriman Murah</h6>
                        <p>Pengiriman murah semua jenis pesanan</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/frontend/img/features/f-icon2.png') }}" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Pengembalian barang jika rusak</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/frontend/img/features/f-icon3.png') }}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p></p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/frontend/img/features/f-icon4.png') }}" alt="">
                        </div>
                        <h6>Keamanan Pembayaran</h6>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area -->
    <section class="category-area mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Product Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @foreach ($product_categories as $category)
                            <div class="col-lg-4 col-md-4">
                                <a href="{{ route('products.category', $category->slug) }}">
                                    <div class="single-deal">
                                        <div class="overlay"></div>
                                        <img class="img-fluid w-100" src="{{ $category->image() }}" alt="">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{ $category->name }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End category Area -->

    <section class="lattest-product-area pb-40 category-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    <!-- single product -->
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ $product->image() }}" alt="">
                                <div class="product-details">
                                    <h6>{{ $product->name }}</h6>
                                    <div class="price">
                                        <h6>Rp. {{ number_format($product->price) }}/pcs</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        {{-- <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Keranjang</p>
                                        </a> --}}
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
        </div>
    </section>

    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Brands</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($brands as $brand)
                    <a class="col single-img" href="javascript:void(0)">
                        <img class="img-fluid d-block mx-auto" src="{{ $brand->image() }} " alt="">
                    </a>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    <x-Admin.Sweetalert />
@endsection
@push('scripts')
    <script>
        $(function() {
            $('body').on('click', '.btnCart', function() {
                $('body #formCart').submit();
            });

            $(".active-banner-slider").owlCarousel({
                items: 1,
                autoplay: false,
                autoplayTimeout: 5000,
                loop: true,
                nav: true,
                navText: ["<img src='{{ asset('assets/frontend/img/banner/prev.png') }}'>", "<img src='{{ asset('assets/frontend/img/banner/next.png') }}'>"],
                dots: false
            });

            /*=================================
            Javascript for product area carousel
            ==================================*/
            $(".active-product-area").owlCarousel({
                items: 1,
                autoplay: false,
                autoplayTimeout: 5000,
                loop: true,
                nav: true,
                navText: ["<img src='{{ asset('assets/frontend/img/product/prev.png') }}'>", "<img src='{{ asset('assets/frontend/img/product/next.png') }}'>"],
                dots: false
            });

            /*=================================
            Javascript for single product area carousel
            ==================================*/
            $(".s_Product_carousel").owlCarousel({
                items: 1,
                autoplay: false,
                autoplayTimeout: 5000,
                loop: true,
                nav: false,
                dots: true
            });

            /*=================================
            Javascript for exclusive area carousel
            ==================================*/
            $(".active-exclusive-product-slider").owlCarousel({
                items: 1,
                autoplay: false,
                autoplayTimeout: 5000,
                loop: true,
                nav: true,
                navText: ["<img src='{{ asset('assets/frontend/img/product/prev.png') }}'>", "<img src='{{ asset('assets/frontend/img/product/next.png') }}'>"],
                dots: false
            });

        })
    </script>
@endpush
