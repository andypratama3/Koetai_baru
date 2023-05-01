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
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $event->nama }}</td>
                        <td>{{ $event->tanggal_mulai->format('d M Y') }}</td>
                        <td>{{ $event->tanggal_selesai->format('d M Y') }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('dashboard.event.show', $event->slug) }}"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-warning" href="{{ route('dashboard.event.edit', $event->slug) }}"><i class="bi bi-pen"></i></a>
                            <a class="btn btn-danger delete" href="#" data-id="{{ $event->slug }}"><i class="bi bi-trash"></i></a>
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item"> {{ $events->onEachSide(1)->links() }}</li>
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                  <!-- End Table with hoverable rows -->

                </div>
              </div>
        </div>
    </div>
</div>

@push('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('dashboard_assets/SwetAlert/index.js') }}"></script>
<script>
  $(".delete").click(function (e) {
            swal({
                    title: 'Anda yakin?',
                    text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete-${slug}`).submit();
                    } else {
                        // Do Nothing
                    }
                });
        });
</script>
@endpush
@endsection
