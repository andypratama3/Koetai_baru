
@extends('layouts.user')
@section('title', 'Shop')
@section('content')

<div class="container-belanja pesantiket">
<div class="main-keranjang">
    <div class="container-keranjang">
        <div class="container-kiri">
            <div class="isinya">
                <h1>Pesanan Tiket</h1>
                @if ($orders->count() > 0)
                @php $totals = 0; @endphp
                @foreach ($orders as $order)
                @php $total = 0; @endphp
                <div class="list-produk pesan_tiket">
                    <div class="produk-ukuran">
                        <div class="produk">
                            <p>{{ $order->nama }}</p>
                        </div>

                    </div>
                    @if($order->tiket->stok > $order->jumlah)
                    <input type="hidden" value="{{ $order->id }}" class="order_id">
                    <div class="jumlah">
                        <div class=" text-center mb-3" style="width: 130px;">
                        <button class="minus change-qty-tiket decrement-btn-tiket">-</button>
                        <input class="no qty-input-tiket" type="text" name="quantity " value="{{ $order->jumlah }}">
                        <button class="plus change-qty-tiket increment-btn-tiket">+</button>
                        </div>
                    </div>
                    @php $total += $order->tiket->harga * $order->jumlah; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                    <h5>Total : Rp. {{ $total }}</h5>
                    <button class="btn btn-danger delete-tiket-order">Delete</button>

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
                <h2>Pesanan <i class="bi bi-cart"></i>Tiket Anda Kosong!</h2>
                <br>
                <a href="{{url('tiket')}}" class="btn btn-keranjang align-center" style="background-color: #FFB716;">Beli Tiket</a>
            </div>
            @endif

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
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
    });

    </script>
    @include('layouts.script')
@endsection
