@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.products.index') }}">Data Produk</a></div>
                <div class="breadcrumb-item">{{ $item->name }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Nama</span>
                                    <span class="ml-5 text-right">{{ $item->name }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Kategori</span>
                                    <span class="ml-5 text-right">{{ $item->category->name ?? '-' }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Harga</span>
                                    <span class="ml-5 text-right">Rp. {{ number_format($item->price) }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Stok</span>
                                    <span class="ml-5 text-right">{{ $item->qty }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Berat (g)</span>
                                    <span class="ml-5 text-right">{{ $item->weight }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Dibuat</span>
                                    <span class="ml-5 text-right">{{ $item->created_at->translatedFormat('l, d F Y') }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Diubah</span>
                                    <span class="ml-5 text-right">
                                        @if ($item->updated_at)
                                        {{ $item->updated_at->translatedFormat('l, d F Y') }}
                                        @endif
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            <img src="{{ $item->image() }}" class="img-fluid postImage" style="max-height:200px" alt="{{ $item->name }}">
                          </div>
                            <div class="description mt-3">
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .postImage{
            max-height: 560px
        }
    </style>
@endpush
