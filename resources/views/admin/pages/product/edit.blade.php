@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.products.index') }}">Data Produk</a></div>
                <div class="breadcrumb-item">Edit Produk</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.products.update',$item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ $item->name }}" id="name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product_category_id">Kategori</label>
                                            <select name="product_category_id" id="product_category_id"
                                                class="form-control select2 @error('product_category_id') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                @foreach ($product_categories as $category)
                                                    <option @selected($category->id == $item->product_category_id) value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Harga</label>
                                            <input type="number"
                                                class="form-control @error('price') is-invalid @enderror"
                                                name="price" value="{{ $item->price }}" id="price">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Stok</label>
                                            <input type="number"
                                                class="form-control @error('qty') is-invalid @enderror"
                                                name="qty" value="{{ $item->qty }}" id="qty">
                                            @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="weight">Berat (g)</label>
                                            <input type="number"
                                                class="form-control @error('weight') is-invalid @enderror"
                                                name="weight" value="{{ $item->weight }}" id="weight">
                                            @error('weight')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Gambar</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary"><i class="fas fa-save"></i>
                                                Simpan</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                cols="30" rows="5">{{ $item->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugin/summernote/summernote.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugin/summernote/summernote-bs4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/plugin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/summernote/summernote.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
            $('#description').summernote({
                height:400,
            });
        })
    </script>
@endpush
