@extends('layouts.app')
@section('title', 'Edit Tiket')


@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">
                    <a href="{{ route('dashboard.tiket.index') }}" class="btn btn-danger float-start btn-sm">Kembali</a>
                    Edit tiket</h5>

                <!-- General Form Elements -->
                <form action="{{ route('dashboard.tiket.update', $tiket->slug ) }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Kategori Tiket</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kategori" value="{{ $tiket->kategori }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="harga" value="{{ $tiket->harga }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="stok" value="{{ $tiket->stok }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">Foto Tiket</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="foto" value="{{ $tiket->foto }}">
                        </div>
                    </div>
                    <div class="row mt-3 mb-3 text-center">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </div>
</div>
@endsection
