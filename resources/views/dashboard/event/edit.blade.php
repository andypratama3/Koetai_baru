@extends('layouts.app')
@section('title', 'Edit Event')

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
                <h5 class="card-title">Tambah Event</h5>
                @include('layouts.flash-message')
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.event.update', $event->slug ) }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Event</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{ $event->nama }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal" class="form-control" value="{{ $event->tanggal }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="foto" value="{{ asset('storage/img/event/' . $event->foto) }}">
                            <br>
                            <img src="{{ asset('storage/img/event/' . $event->foto) }}" alt=""  class="imgs">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                        <input class="quill-editor-full form-control" cols="30" rows="10" name="deskripsi" value="{{ $event->deskripsi }}">
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

@push('js')
<script src="{{ asset('dashboard_assets/assets/vendor/quill/quill.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
$(function () {
    $('input[name="tanggal"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'M/DD hh:mm A'
        }
    });
});
</script>
@endpush
