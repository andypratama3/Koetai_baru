@extends('layouts.app')
@section('title', 'Detail Talent')

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Tiket</h5>
               

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kategori Tiket</label>
                    <div class="col-sm-10">
                        {{ $tiket->kategori }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        Rp. {{ $tiket->harga }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        {{ $tiket->stok }}
                    </div>
                </div>
                <div class="row mt-3 mb-3 text-center">
                    <div class="col-sm-10">
                        <a href="{{ route('dashboard.tiket.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
