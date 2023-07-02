@extends('layouts.user')
@section('title', 'Cart')
@section('content')
<div class="container-belanja cartitems">
    <div class="main-keranjang">
        <div class="container-keranjang">
            <div class="isinya">
                <h1>Keranjang Belanja Anda</h1>
                @if ($carts->count() > 0)
                @php $totals = 0; @endphp
                @foreach ($carts as $cart)
                @php $total = 0; @endphp
                <div class="list-produk produk_data">
                    <div class="produk">
                        <div class="rectangle-list">
                            <img src="{{ asset('asset_user/assets/img/rectangle-list.png') }}" alt="" srcset="">
                        </div>
                        <img src="{{ asset('storage/img/produk/'.$cart->produks->foto) }}" alt="">
                        <p>{{ $cart->produks->nama }}</p>
                    </div>
                    <div class="ukuran">
                        <div class="ukuran-content">
                            <p>Variasi</p>
                            <p class="variasi">{{ $cart->prod_ukuran }}</p>
                        </div>
                    </div>
                    @if($cart->produks->stock > $cart->prod_qty)
                    <input type="hidden" value="{{ $cart->prod_id }}" class="prod_id">
                    <div class="jumlah">
                        <div class="jumlah-produk">
                            <button class="minus changeQuantity decrement-btn">-</button>
                            <input class="no qty-input" type="text" name="quantity " value="{{ $cart->prod_qty }}">
                            <button class="plus changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    @php $total += $cart->produks->harga * $cart->prod_qty; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                    <div class="harga">
                        <p>Total : Rp. {{ $total }}</p>
                    </div>
                    <div class="btn-x">
                        <button class="delete-cart"><i class='bx bx-x'></i></button>
                    </div>
                    <input type="hidden" class="prod_id" value="{{ $cart->prod_id }}">
                </div>
                <hr>
                @php $totals += $cart->produks->harga * $cart->prod_qty; @endphp
                @endforeach
                <div class="total">
                    <p>Lanjut Pembayaran</p>
                    <p class="total-harga">Total Semua : Rp. {{ $totals }}</p>
                </div>
                <div class="btn-checkout">
                    <button type="submit" class="btn-checkout-form">Checkout</button>
                </div>
            </div>
            @else
            <div class="card-body text-center">
                <h2>Keranjang<i class="bi bi-cart"></i> Anda Kosong!</h2>
                <br>
                <a href="{{url('shop')}}" class="btn btn-warning btn-keranjang align-center">Continue Shopping</a>
            </div>
            @endif
        </div>
    </div>
    @include('layouts.script')
    @endsection