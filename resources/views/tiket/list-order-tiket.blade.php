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
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
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
                        <h5 class="card-title float-end"><a href="/tiket" class="btn btn-primary"><i
                                    class="bi bi-plus"></i> Tambah</a></h5>
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
                                    $total = 0;
                                    $total += $order->tiket->harga * $order->jumlah;
                                    @endphp
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $order->nama }}</td>
                                    <td>{{ $order->tiket->kategori }}</td>
                                    <td>{{ $order->jumlah }} Tiket</td>
                                    <td>Rp.{{ $total }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="details" data-toggle="modal"
                                            data-target="#detailModal" data-nama="<?=$order->nama ?>"
                                            data-kategori="<?=$order->tiket->kategori ?>"
                                            data-jumlah="<?=$order->jumlah ?>" data-total="<?=$total ?>">
                                            Check Out
                                        </button>
                                        <a href="#" data-id="{{ $order->slug }}" class="btn btn-danger delete"
                                            title="Hapus">
                                            <form action="{{ route('list.destroy', $order->slug) }}"
                                                id="delete-{{ $order->slug }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="bi bi-trash">
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
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td><span id="nama"></span></td>
                            </tr>
                            <tr>
                                <td>kategori</td>
                                <td><span id="kategori"></span></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td><span id="jumlah"></span> Tiket</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>Rp. <span id="total"></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="pay-button" class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.script')
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

            $(document).ready(function () {
                $(document).on('click', '#details', function () {
                    var nama = $(this).data('nama');
                    var kategori = $(this).data('kategori');
                    var jumlah = $(this).data('jumlah');
                    var total = $(this).data('total');

                    $('#nama').text(nama);
                    $('#kategori').text(kategori);
                    $('#jumlah').text(jumlah);
                    $('#total').text(total);

                });
            });
        </script>

        {{-- <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
        onSuccess: function (result) {
        /* You may add your own implementation here */
        alert("payment success!");
        console.log(result);
        },
        onPending: function (result) {
        /* You may add your own implementation here */
        alert("wating your payment!");
        console.log(result);
        },
        onError: function (result) {
        /* You may add your own implementation here */
        alert("payment failed!");
        console.log(result);
        },
        onClose: function () {
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
        }
        })
        });
        </script> --}}
</body>

</html>