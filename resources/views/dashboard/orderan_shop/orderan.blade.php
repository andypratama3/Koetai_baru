@extends('layouts.app')
@section('title', 'Orderan Shop')


@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                  <!-- Table with hoverable rows -->
                  <table class="table table-responsive-lg text-center">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Kategori Pesanan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($ordersShop as $order)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $order->nama_penerima }}</td>
                        <td>{{ $order->nomor_telpon}}</td>
                        <td>{{ $order->prod_id}}</td>
                        <td>{{ $order->prod_qty}}</td>
                        <td>{{ $order->prod_ukuran}}</td>
                        <td>{{ $order->kategori_pesanan}}</td>
                        <td>{{ $order->alamat}}</td>
                        <td><span class="badge {{ $order->status == 'Unpaid' ? 'bg-danger' : 'bg-success' }} text-dark">{{ $order->status }}</span></td>
                        {{-- <td>{{ $order->status}}</td> --}}
                        <td>
                            <a class="btn btn-primary" href="{{ route('dashboard.order.show',$order->slug) }}"><i class="bi bi-eye"></i></a>
                            <a href="#" data-id="{{ $order->slug }}" class="btn btn-danger delete" title="Hapus">
                                <form action="{{ route('dashboard.order.destroy', $order->slug) }}" id="delete-{{ $order->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="bi bi-trash">
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{-- <div class="">Total order : {{ $count }}</div> --}}
                </div>
                {{-- <ul class="pagination">
                    <li class="page-item"> {{ $ordersShop->onEachSide(1)->links() }}</li>
                    </li>
                </ul> --}}

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
