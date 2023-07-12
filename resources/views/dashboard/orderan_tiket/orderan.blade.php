@extends('layouts.app')
@section('title', 'Orderan Tiket')


@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                  <a href="{{ route('dashboard.order.export') }}" class="btn btn-success"><i class='bx bx-export'> Export</i></a>
                  <a href="{{ route('dashboard.order.create') }}" class="btn btn-primary float-end" style="margin-bottom: 2rem;"><i class="bi bi-plus"></i> Tambah</a></h5>
                  <!-- Table with hoverable rows -->
                  <table class="table table-responsive-lg text-center">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori Tiket</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Email</th>
                        <th scope="col">Order ID</th>
                        <th scpe="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderan as $order)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $order->nama }}</td>
                        <td>{{ $order->tiket->kategori}}</td>
                        <td>{{ $order->jumlah}}</td>
                        <td>{{ $order->email}}</td>
                        <td>{{ $order->order_id}}</td>
                        <td>{{ $order->gross_amount}}</td>
                        <td><span class="badge {{ $order->status == 'pending' ? 'bg-danger' : 'bg-success' }} text-dark">{{ $order->status }}</span></td>
                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('dashboard.order.show',$order->order_id) }}"><i class="bi bi-eye"></i></a>
                            <a href="#" data-id="{{ $order->order_id }}" class="btn btn-danger delete" title="Hapus">
                                <form action="{{ route('dashboard.order.destroy', $order->order_id) }}" id="delete-{{ $order->order_id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="bi bi-trash">
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div class="">Total order : {{ $count }}</div>
                </div>
                <ul class="pagination">
                    <li class="page-item"> {{ $orderan->onEachSide(1)->links() }}</li>
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
        order_id = e.target.dataset.id;
        swal({
                title: 'Anda yakin?',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(`#delete-${order_id}`).submit();
                } else {
                    // Do Nothing
                }
            });
    });
</script>
@endpush
@endsection
