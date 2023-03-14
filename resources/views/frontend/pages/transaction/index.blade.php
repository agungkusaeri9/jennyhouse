@extends('frontend.layouts.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Riwayat Pesanan</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}l">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('transactions.index') }}">Riwayat Pesanan</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title_confirmation">
                        Riwayat Pesanan
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->created_at->translatedFormat('d-m-Y H:i:s') }}</td>
                                            <td>Rp. {{ number_format($transaction->transaction_total) }}</td>
                                            <td>
                                                @if ($transaction->transaction_status === 'PENDING')
                                                    <span class="btn btn-sm btn-secondary">PENDING</span>
                                                @elseif($transaction->transaction_status === 'PROCESS')
                                                    <span class="btn btn-sm btn-warning text-white">PROCESS</span>
                                                @elseif($transaction->transaction_status === 'SUCCESS')
                                                    <span class="btn btn-sm btn-success">SUCCESS</span>
                                                    @else
                                                    <span class="btn btn-sm btn-danger">FAILED</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('transactions.success', $transaction->uuid) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">
                                            <p class="text-center">
                                                Riwayat Transaksi Tidak Ada!
                                            </p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->
@endsection
