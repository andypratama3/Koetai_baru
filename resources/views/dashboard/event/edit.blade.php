@extends('layouts.app')
@section('title', 'Edit Event')

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
                <h5 class="card-title text-center">
                    Ubah Event</h5>
                @include('layouts.flash-message')
                <!-- General Form Elements -->
                <form action="{{ route('dashboard.event.update', $event->slug ) }} " method="POST"
                    enctype="multipart/form-data">
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
                            <input class="form-control" type="file" id="formFile" name="foto"
                                value="{{ asset('storage/img/event/' . $event->foto) }}">
                            <br>
                            <img src="{{ asset('storage/img/event/' . $event->foto) }}" alt="" class="imgs">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                        <input class="quill-editor-full form-control" cols="30" rows="10" name="deskripsi"
                            value="{{ $event->deskripsi }}">
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Talent</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select select-talent" aria-label="Pilih Talent"
                                            name="talent[]">
                                            <option selected disabled>Pilih Talent</option>
                                            @foreach($talents as $talent)
                                            <option value="{{ $talent->id }}">{{ $talent->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="dynamic-ar" class="btn btn-sm btn-primary"><i
                                                class="bi bi-plus"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3 text-center">
                        <div class="col-sm-6">
                            <a href="{{ route('dashboard.event.index') }}" class="btn btn-danger float-start btn-sm">Kembali</a>
                        </div>
                        <div class="col-sm-6">
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
<script type="text/javascript">
    
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(
                `<tr>
                    <td>
                        <select class="form-select" aria-label="Pilih Talent" id="talent-select2_${i}" name="talent[` + i + `]">
                            <option selected disabled>Pilih Talent</option>
                            @foreach($event->talents as $talent)
                            <option value="{{ $talent->id }}">{{ $talent->nama }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger remove-input-field"><i class="bi bi-trash"></i></button></td>
                    </td>
                </tr>`
            );
            $(`#talent-select2_${i}`).select2();
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

        $('.select-talent').select2();
    });
</script>
@endpush