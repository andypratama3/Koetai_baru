@extends('layouts.app')
@section('title', 'Detail Event')

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Event</h5>
               

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Event</label>
                    <div class="col-sm-10">
                        {{ $event->nama }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        {{ $event->tanggal_mulai->format('d m Y H:i:s') }} - {{ $event->tanggal_selesai->format('d m Y H:i:s') }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <img src="{{ asset('storage/img/event/' . $event->foto) }}" alt="" srcset="">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                </div>
                <div class="row mb-3">
                        {{ $event->deskripsi }}
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
                                <th class="text-center">Talent</th>
                            </tr>
                            @forelse ($event->talents as $talent)
                            <tr>
                                <td>
                                    {{ $talent->nama }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center">
                                    Belum ada Talent
                                </td>
                            </tr>
                            @endforelse

                        </table>
                    </div>
                </div>

                <div class="row mt-3 mb-3 text-center">
                    <div class="col-sm-12">
                        <a href="{{ route('dashboard.event.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
