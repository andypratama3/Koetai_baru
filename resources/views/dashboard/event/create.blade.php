@extends('layouts.app')
@section('title', 'Tambah Event')

@push('css')
<link href="{{ asset('dashboard_assets/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard_assets/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Event</h5>
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
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.event.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Event</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal" class="form-control" />
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
                        <div class="quill-editor-full form-control"></div>

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
