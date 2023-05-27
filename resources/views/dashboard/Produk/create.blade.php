@extends('layouts.app')
@section('title', 'Tambah Produk')

@push('css')
<link href="{{ asset('dashboard_assets/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard_assets/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Produk</h5>
                @include('layouts.flash-message')
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.produk.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="foto">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="deskripsi" id="deskripsi">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="stock" id="stock">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Kategori Produk</label>
                        <div class="col-sm-10">
                            <select class="form-select select-talent" aria-label="Pilih kategori" name="kategori[]">
                                <option selected disabled>Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="harga" id="harga">
                        </div>
                    </div>

                    <div class="row mt-3 mb-3 text-center">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </div>
</div>
@endsection



