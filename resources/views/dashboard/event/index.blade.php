@extends('layouts.app')
@section('title', 'Event')

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title float-end"><a href="{{ route('dashboard.event.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a></h5>

                  <!-- Table with hoverable rows -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                      <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $event->nama }}</td>
                        <td>{{ $event->tanggal->format('D-M-Y') }}</td>
                        <td>
                            <a class="btn btn-primary" href="#"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-warning" href="#"><i class="bi bi-pen"></i></a>
                            <a class="btn btn-danger" href="#"><i class="bi bi-trash"></i></a>
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->

                </div>
              </div>
        </div>
    </div>
</div>
@endsection
