@extends('layouts.user')
@section('title','Cart')
@section('content')

<main>

    <div id="container">
        <div class="container-belanja">
            <nav class="nav-belanja">
                <ul>
                    <li>BAJU</li>
                    <li>MERCHANDISE</li>
                </ul>
            </nav>
            @if ($carts->count() > 0)
            @php $total = 0; @endphp

            <div class="isi-belanja">
                <div class="container-isi">
                    <div class="row">
                    @foreach ($carts as $cart)
                    <div class="cart">
                        <img src="{{ asset('storage/img/produk/'. $cart->produk->foto) }}" alt="cart Baju 1">
                        <div class="konten-bawah">
                            <div class="teks nama-cart">{{ $cart->nama }}</div>
                            <div class="teks harga">Rp.{{ $cart->harga }}</div>
                        </div>
                        <button>Beli</button>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
            <hr>
            <div>
                <a href="{{url('checkout')}}" class="btn btn-primary float-end">Proceed Check Out</a>
                <h2>Total Rp.{{$total}}</h2>
            </div>
            @else
            <div class="isi-belanja">
                <div class="container-isi">
                    <h2>Your <i class="bi bi-cart"></i> Cart is empty</h2>
                    <a href="{{url('shop')}}" class="btn btn-success float-end">Continue Shopping</a>
                </div>
            </div>
            @endif
        </div>
    </div>

</main>

<div id="preloader"></div>
@endsection
