
@extends('layouts.user')
@section('title', 'Shop')
@section('content')

<div class="container-belanja cartitems">
<div class="main-keranjang">
    <div class="container-keranjang">
        <div class="container-kiri">
            <div class="isinya">
                <h1>Pesanan Tiket</h1>
                @if ($orders->count() > 0)
                @php $totals = 0; @endphp
                @foreach ($orders as $order)
                @php $total = 0; @endphp
                <div class="list-produk produk_data">
                    <div class="produk-ukuran">
                        <div class="produk">
                            <p>{{ $order->nama }}</p>
                        </div>

                    </div>
                    @if($order->tiket->stok > $order->jumlah)
                    {{-- <input type="hidden" value="{{ $order->prod_id }}" class="prod_id"> --}}
                    <div class="jumlah">
                        <div class=" text-center mb-3" style="width: 130px;">
                        <button class="minus decrement-btn">-</button>
                        <input class="no qty-input qty-input" type="text" name="quantity " value="{{ $order->jumlah }}">
                        <button class="plus  increment-btn">+</button>
                        </div>
                    </div>
                    @php $total += $order->tiket->harga * $order->jumlah; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                    <h5>Total : Rp. {{ $total }}</h5>
                    <a href="#" data-id="{{ $order->slug }}" class="btn btn-danger delete"
                        title="Hapus">
                        <form action="{{ route('tiket.destroy', $order->slug) }}"
                            id="delete-{{ $order->slug }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                        </form>
                        Delete
                        </a>
                    <input type="hidden" class="prod_id" value="{{ $order->prod_id }}">
                </div>
                <hr>
                @php $totals += $order->tiket->harga * $order->jumlah; @endphp
                @endforeach
                <div class="total float-end">
                    <h5>Total Semua Rp. {{ $totals }}</h5>
                    <a href="" class="btn btn-keranjang align-center float-end" style="background-color: #FFB716;">Bayar</a>
                </div>
            </div>
            @else
            <div class="card-body text-center">
                <h2>Your <i class="bi bi-cart"></i>Keranjang Anda Kosong!</h2>
                <br>
                <a href="{{url('shop')}}" class="btn btn-keranjang align-center" style="background-color: #FFB716;">Continue Shopping</a>
            </div>
            @endif

        </div>
    </div>
</div>
    @include('layouts.script')

@endsection

{{-- @extends('layouts.user')
@section('title', 'Tiket')
@section('content')
<main>
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
</main>

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
<<<<<<< HEAD
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
=======
</div>
    @include('layouts.script')

>>>>>>> 421b9ab6a5afe0923f91ff64c7a39ba4fc4b5d93

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
<<<<<<< HEAD
        });
        </script> --}}
</body>

</html>
=======
    });
</script> --}}
{{-- @endsection --}}
>>>>>>> 421b9ab6a5afe0923f91ff64c7a39ba4fc4b5d93
