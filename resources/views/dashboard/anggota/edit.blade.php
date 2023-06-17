@extends('layouts.app')
@section('title', 'Tambah Anggota')

@push('css')
<link href="{{ asset('dashboard_assets/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard_assets/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .imgs{
        width : 100px;

    }
</style>
@endpush


@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Anggota</h5>
                
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.anggota.update', $anggota->slug ) }} " method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" placeholder="nama" value="{{ $anggota->nama }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>


                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="foto" value="{{ $anggota->foto }}"  >
                            <br>
                            <div>Foto :</div>
                            <img src="{{ asset('storage/img/Anggota/' . $anggota->foto) }}" alt="" srcset="" class="imgs">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Devisi</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="devisi" id="devisi" placeholder="devisi" value="{{ $anggota->devisi }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="instagram" id="instagram" placeholder="instagram" value="{{ $anggota->instagram }}">
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

@push('js')
<script src="{{ asset('dashboard_assets/assets/vendor/quill/quill.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

@endpush
