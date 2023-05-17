
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('dashboard_assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('dashboard_assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dashboard_assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('dashboard_assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    @stack('css')
    <!-- Template Main CSS File -->
    <link href="{{ asset('dashboard_assets/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
      * Template Name: NiceAdmin - v2.4.1
      * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
        ======================================================== -->
</head>

<body>

<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title float-end"><a href="/tiket" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a></h5>
                  <!-- Table with hoverable rows -->
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori Tiket</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($orders as $order)
                      <tr>
                        @php
                            $totals = 0;
                            $totals += $order->tiket->harga * $order->jumlah;
                        @endphp
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $order->nama }}</td>
                        <td>{{ $order->tiket->kategori }}</td>
                        <td>{{ $order->jumlah }} Tiket</td>
                        <td>Rp.{{ $totals }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="{{ $order->slug }}">
                                bayar
                              </button>
                            <a class="btn btn-primary" href="{{ route('tiket.show', $order->slug) }}"><i class="bi bi-eye"></i></a>
                            {{-- <a class="btn btn-warning" href="{{ route('order.edit', $order->slug) }}"><i class="bi bi-pen"></i></a> --}}
                            {{-- <a href="#" data-id="{{ $order->slug }}" class="btn btn-danger delete" title="Hapus"> --}}

                                {{-- <form action="{{ route('order.destroy', $order->slug) }}" id="delete-{{ $order->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form> --}}
                                {{-- <i class="bi bi-trash"> --}}
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                </div>
                <ul class="pagination">


                    </li>

                </ul>

              </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="nama" readonly value="{{ $order->nama }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori Tiket</label>
                <div class="col-sm-10">
                  <input type="" name="harga" value="{{ $order->kategori_tiket }}" readonly>
                </div>
              </div>
              <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                    : {{ $order->jumlah }}
               </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

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


</body>
</html>
