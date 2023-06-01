
@extends('layouts.user')
@section('title', 'List Order Tiket')
@section('content')

<div class="container-pesanan-tiket pesantiket">
<div class="main-keranjang">
    <div class="container-keranjang">
        <div class="container">
            <div class="isinya">
                <h1>Pesanan Tiket</h1>
                @if ($orders->count() > 0)
                {{-- @php $totals = 0; @endphp --}}
                @foreach ($orders as $order)
                @php $total = 0; @endphp
                <div class="list-produk pesan_tiket">
                    <div class="produk-ukuran">
                        <div class="produk">
                            <p>{{ $order->nama }}</p>
                        </div>

                    </div>

                    <input type="hidden" value="{{ $order->id }}" class="order_id">
                    <div class="jumlah">
                        <div class=" text-center mb-3" style="width: 130px;">
                        <input class="no qty-input-tiket" type="text" name="quantity " value="{{ $order->jumlah }}" readonly>
                        </div>
                    </div>
                    @php $total += $order->tiket->harga * $order->jumlah; @endphp

                    <h5>Total : Rp. {{ $total }}</h5>
                    <h5>{{ $order->status }}</h5>
                    {{-- <button class="btn btn-danger delete-tiket-order">Delete</button> --}}
                    <button class="btn btn-keranjang align-center float-end pay-button" style="background-color: #FFB716;">Detail</button>
                    <input type="hidden" value="{{ $order->tiket->harga }}" class="harga">
                    <input type="hidden" class="prod_id" value="{{ $order->prod_id }}">
                </div>
                <hr>
                @php $total += $order->tiket->harga * $order->jumlah; @endphp
                @endforeach

                <div class="total float-end">
                    {{-- <h5>Total Semua Rp. {{ $totals }}</h5> --}}
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
</div>
@include('layouts.script')
@endsection

