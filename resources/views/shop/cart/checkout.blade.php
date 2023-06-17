@extends('layouts.user')
@section('title', 'Checkout')
@section('content')

<div class="container-belanja cartitems">
    <div class="main-keranjang">
        <div class="container-keranjang">
            <div class="isinya">
                <h1>Pesanan Belanja Anda</h1>
                @php $totals = 0; @endphp
                @foreach ($carts as $cart)
                @php $total = 0; @endphp
                <div class="list-produk produk_data">
                    <div class="gambar-produk">
                        <img src="{{ asset('storage/img/produk/'.$cart->produks->foto) }}" alt="">
                    </div>
                    <div class="produk-ukuran">
                        <div class="produk">
                            <p>{{ $cart->produks->nama }}</p>
                        </div>
                        <div class="ukuran">
                            <p>Ukuran : {{ $cart->prod_ukuran }}</p>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $cart->prod_id }}" class="prod_id">
                    <div class="jumlah">
                        <div class=" text-center jumlah-produk" style="width: 130px;">
                            <input class="no qty-input" type="text" name="quantity " value="{{ $cart->prod_qty }}">
                        </div>
                    </div>
                    @php $total += $cart->produks->harga * $cart->prod_qty; @endphp

                    <div class="harga">
                        <p>Total : Rp. {{ $total }}</p>
                    </div>
                    <div class="btn-x">
                        <button class="float-end delete-cart"><i class='bx bx-x'></i></button>
                    </div>
                    <input type="hidden" class="prod_qty" value="{{ $cart->prod_qty}}">
                    <input type="hidden" class="prod_ukuran" value="{{ $cart->prod_ukuran}}">
                </div>
                <hr>
                @php $totals += $cart->produks->harga * $cart->prod_qty; @endphp
                @endforeach
                <div class="total">
                    <p>Total Semua : Rp. {{ $totals }}</p>
                    <button type="submit" class="btn btn-warning btn-lg btn-checkout">Check Out</button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.script')
    @endsection
