@extends('layouts.app')
@section('title', 'Edit Talent')

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
                    <a href="{{ route('dashboard.talent.index') }}" class="btn btn-danger float-start btn-sm">Kembali</a>
                    Edit Talent</h5>
                @include('layouts.flash-message')
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.talent.update', $talent->slug ) }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Talent</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{ $talent->nama }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" value="{{ $talent->deskripsi }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="foto">
                            <br>
                            <img src="{{ asset('storage/img/talent/' . $talent->foto) }}" alt="" class="imgs">
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
