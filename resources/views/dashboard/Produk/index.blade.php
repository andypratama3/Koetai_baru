@extends('layouts.app')
@section('title', 'Produk')


@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title float-end"><a href="{{ route('dashboard.produk.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a></h5>
                  <!-- Table with hoverable rows -->
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    {{-- @foreach ($produks as $produk)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->tanggal_mulai->format('d M Y H:i:s') }}</td>
                        <td>{{ $produk->tanggal_selesai->format('d M Y H:i:s') }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('dashboard.produk.show', $produk->slug) }}"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-warning" href="{{ route('dashboard.produk.edit', $produk->slug) }}"><i class="bi bi-pen"></i></a>
                            <a href="#" data-id="{{ $produk->slug }}" class="btn btn-danger delete" title="Hapus">

                                <form action="{{ route('dashboard.produk.destroy', $produk->slug) }}" id="delete-{{ $produk->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="bi bi-trash">
                        </td>

                      </tr>
                    @endforeach --}}
                    </tbody>
                  </table>
                  {{-- <div class="">Total produk : {{ $count }}</div> --}}
                </div>
                <ul class="pagination">
                    {{-- <li class="page-item"> {{ $produks->onEachSide(1)->links() }}</li> --}}

                    </li>

                </ul>

              </div>
        </div>
    </div>
</div>

@push('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('dashboard_assets/SwetAlert/index.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  $(".delete").click(function (e) {
        slug = e.target.dataset.id;
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
