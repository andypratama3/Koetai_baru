@extends('layouts.app')
@section('title', 'Detail Anggota')



@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Anggota</h5>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Anggota :</label>
                    <div class="col-sm-10">
                        {{ $anggota->nama }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Devisi   :</label>
                    <div class="col-sm-10">
                        {{ $anggota->devisi}}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Instagram    :</label>
                    <div class="col-sm-10">
                        {{ $anggota->instagram}}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <img src="{{ asset('storage/img/Anggota/' . $anggota->foto) }}" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3 text-center">
                    <div class="col-sm-10">
                        <a href="{{ route('dashboard.anggota.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
