@extends('frontend.layouts.app')
@section('content')
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Hydrokeratin Curl Serum <br>Collection!</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="cart.html"><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('assets/frontend/img/banner/banner.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide">
                            <div class="col-lg-5">
                                <div class="banner-content">
                                    <h1><br>Stock Terbatas!</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('assets/frontend/img/banner/banner-img.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
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
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/category/p9.png') }}"
                                    alt="">
                                <a href="{{ asset('assets/frontend/img/category/p9.png') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Haircare</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/category/p7.jpg') }}"
                                    alt="">
                                <a href="{{ asset('assets/frontend/img/category/p7.png') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Cosmetics</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/category/p10.png') }}"
                                    alt="">
                                <a href="{{ asset('assets/frontend/img/category/p10.png') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Hair Color</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/category/p2.png') }}"
                                    alt="">
                                <a href="{{ asset('assets/frontend/img/category/p2.png') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Haircare</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End category Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et
                                dolore
                                magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    @forelse ($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <div class="single-product">
                                    <img class="img-fluid" src="{{ $product->image() }}"
                                        alt="">
                                    <div class="product-details">
                                        <h6>{{ $product->name }}</h6>
                                        <div class="price">
                                            <h6>Rp. {{ number_format($product->price) }}</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <form action="{{ route('cart.store') }}" method="post" id="formCart">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="qty" value="1">
                                            </form>
                                            <a href="javascript:void(0)" class="social-info btnCart">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">add to bag</p>
                                            </a>

                            </a>
                        </div>
                </div>
            </div>
            </a>
        </div>
    @empty
        @endforelse
        </div>
        </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Coming Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et
                                dolore
                                magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p6.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p8.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p3.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p5.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p1.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p4.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p1.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/product/p8.jpg') }}"
                                alt="">
                            <div class="product-details">
                                <h6>Rebak Style Repair Treatment [230ml]</h6>
                                <div class="price">
                                    <h6>Rp.350.000</h6>
                                    <h6 class="l-through">Rp.410.000</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="cart.html" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end product Area -->



    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/brand/0.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/brand/0.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/brand/0.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/brand/0.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/brand/0.png') }}"
                        alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    <x-Admin.Sweetalert />
@endsection
@push('scripts')
<script>
    $(function(){
        $('body').on('click','.btnCart', function(){
            $('body #formCart').submit();
        })
    })
</script>
@endpush
