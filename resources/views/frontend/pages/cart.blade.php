@extends('frontend.layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Keranjang Belanja</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Keranjang</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ $cart->product->image() }}" alt=""
                                                    style="max-height: 80px">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $cart->product->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rp. {{ number_format($cart->price) }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="text" name="qty" id="sst" maxlength="12"
                                                value="{{ $cart->qty }}" title="Quantity:" class="input-text qty">
                                            <button
                                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                class="increase items-count" type="button"><i
                                                    class="lnr lnr-chevron-up"></i></button>
                                            <button
                                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                class="reduced items-count" type="button"><i
                                                    class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rp. {{ number_format($cart->price_total) }}</h5>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.destroy',$cart->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">
                                        Keranjang Kosong!
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr class="bg-dark">
                                <td colspan="3" class="text-center text-white">
                                    <h5 class="text-white">Subtotal</h5>
                                </td>
                                <td colspan="2" class="text-center text-white">
                                    <h5 class="text-white">Rp. {{ number_format($carts->sum('price_total')) }}</h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!--================End Cart Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <form action="{{ route('checkout') }}" method="post" class="row contact_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <h3>Detail Pengiriman</h3>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Nama Lengkap"
                                    value="{{ auth()->user()->name }}">
                                @error('name')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <textarea name='address' id='address' cols='30' rows='2'
                                    class='form-control @error('address') is-invalid @enderror' placeholder="Alamat Lengkap">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="number" name="phone_number" placeholder="Nomor HP">
                                @error('phone_number')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
                                @error('email')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="order_box">
                                <h2>Detail Pembelian</h2>
                                <ul class="list list_2">
                                    <li><a href="#">Subtotal <span>Rp.
                                                {{ number_format($carts->sum('price_total')) }}</span></a></li>
                                </ul>
                                @forelse ($payments as $payment)
                                    <div class="payment_item">
                                        <div class="radion_btn">
                                            <input type="radio" id="{{ $payment->id }}" name="payment_id" value="{{ $payment->id }}">
                                            <label for="{{ $payment->id }}">{{ $payment->name }}</label>
                                            <div class="check"></div>
                                        </div>
                                        <p>{{ $payment->number . ' - ' . $payment->desc }}</p>
                                    </div>
                                @empty
                                @endforelse
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector">
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <button class="btn btn-block primary-btn">Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>
@endsection
