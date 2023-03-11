@extends('frontend.layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Konfirmasi</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}l">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="javascript:void(0)">Konfirmasi</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <h3 class="title_confirmation">Terima kasih. Pesanan Anda telah diterima.
                <p class="small text-dark mt-2">Silahkan untuk melakukan pembayaran dengan nominal Rp. {{ number_format($transaction->transaction_total) }} ke {{ $transaction->payment->name . ' : ' . $transaction->payment->number . ' a.n ' . $transaction->payment->desc}}</p>
            </h3>

            <div class="row order_d_inner">
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Info Order</h4>
                        <ul class="list">
                            <li><a href="javascript:void(0)"><span>Nomor Order</span> : 60235</a></li>
                            <li><a href="javascript:void(0)"><span>Nama</span> : {{ $transaction->name }}</a></li>
                            <li><a href="javascript:void(0)"><span>Alamat</span> : {{ $transaction->address }} </a></li>
                            <li><a href="javascript:void(0)"><span>Nomor Telepon</span> : {{ $transaction->phone_number }}</a></li>
                            <li class="">
                                <a href="javascript:void(0)" class="d-flex justify-content-start">
                                    <span>Metode Pembayaran </span>  :
                                <span class="ml-1">
                                    @if ($transaction->payment_id)
                                    {{ $transaction->payment->name }}  <br>
                                    {{ $transaction->payment->number }} <br>
                                    {{ $transaction->payment->desc }}
                                @endif
                                </span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>&nbsp;</h4>
                        <ul class="list">
                            <li><a href="javascript:void(0)"><span>Total</span> : Rp. {{ number_format($transaction->transaction_total) }}</a></li>
                            <li><a href="javascript:void(0)"><span>Status</span> : {{ $transaction->transaction_status }}</a></li>
                            <li><a href="javascript:void(0)"><span>Tanggal</span> : {{ $transaction->created_at->translatedFormat('d-m-Y H:i:s') }}</a></li>
                        </ul>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Alamat Pengiriman</h4>
                        <ul class="list">
                            <li><a href="#"><span>Provinsi</span> : Jawa Tengah</a></li>
                            <li><a href="#"><span>Kabupaten</span> : Semarang</a></li>
                            <li><a href="#"><span>Kota</span> : Semarang</a></li>
                            <li><a href="#"><span>Kode Pos</span> : 45777</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <div class="order_details_table">
                <h2>Detail Pembelian</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($transaction->details as $detail)
                               <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->product->name }}</td>
                                <td>Rp. {{ number_format($detail->price) }}</td>
                                <td>{{ $detail->qty }}</td>
                                <td>Rp. {{ number_format($detail->price_total) }}</td>
                               </tr>
                           @empty

                           @endforelse
                            <tr>
                                <td>
                                    <p>Subtotal</p>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p></p>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <p>Rp. {{ number_format($transaction->details->sum('price_total')) }}</p>
                                </td>
                                <td>
                                    <p></p>
                                </td>
                                <td>
                                    <p></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->
@endsection
