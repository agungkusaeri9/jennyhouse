@extends('frontend.layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>{{ $product->name }}</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('products.index') }}">Products<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('products.show',$product->slug) }}">{{ $product->name }}</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ $product->image() }}" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ $product->image() }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <form action="{{ route('cart.store') }}" method="post">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>RP.  {{ number_format($product->price) }}/pcs</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Kategori</span> : {{ $product->category->name }}</a></li>
                        <li><a href="#"><span>Berat</span> : {{ $product->weight }} g</a></li>
                        <li><a href="#"><span>Stock</span> : {{ $product->qty }}</a></li>

                    </ul>
                    {{-- <p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for
                        something that can make your interior look awesome, and at the same time give you the pleasant warm feeling
                        during the winter.</p> --}}
                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                         class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                         class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                    </div>
                    <div class="card_area d-flex align-items-center">
                            @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="primary-btn btn">Tambah keranjang</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Deskripsi</h4>
                <hr>
                {!! $product->description !!}
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->
@endsection
