@extends('layouts.app')
@section('title', 'Detail Talent')

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Talent</h5>
                @if (count($errors) > 0)
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    <h5><i class="bi bi-ban"></i>Peringatan!</h5>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Talent</label>
                    <div class="col-sm-10">
                        {{ $talent->nama }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <img src="{{ asset('storage/img/talent/' . $talent->foto) }}" alt="" srcset="">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                </div>
                <div class="row mb-3">
                        {{ $talent->deskripsi }}
                </div>
                <div class="row mt-3 mb-3 text-center">
                    <div class="col-sm-10">
                        <a href="{{ route('dashboard.talent.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
