@extends('layouts.app')
@section('title', 'Edit kategori')

@push('css')
<style>
    .imgs {
        width: 100px;

    }
</style>
@endpush

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">
                    <a href="{{ route('dashboard.kategori.index') }}" class="btn btn-danger float-start btn-sm">Kembali</a>
                    Edit kategori</h5>
            
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.kategori.update', $kategori->slug ) }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{ $kategori->nama }}">
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
