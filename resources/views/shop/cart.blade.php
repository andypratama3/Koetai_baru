@extends('layouts.user')
@section('title', 'Shop')
@section('content')

<div class="container-belanja cartitems">
<div class="main-keranjang">
    <div class="container-keranjang">
        <div class="container-kiri">
            <div class="isinya">
                <h1>Keranjang Belanja Anda</h1>
                @if ($carts->count() > 0)
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
                            <h2>Ukuran : {{ $cart->prod_ukuran }}</h2>
                        </div>
                    </div>
                    @if($cart->produks->stock > $cart->prod_qty)
                    <input type="hidden" value="{{ $cart->prod_id }}" class="prod_id">
                    <div class="jumlah">
                        <div class=" text-center mb-3" style="width: 130px;">
                        <button class="minus changeQuantity decrement-btn">-</button>
                        <input class="no qty-input" type="text" name="quantity " value="{{ $cart->prod_qty }}">
                        <button class="plus changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    @php $total += $cart->produks->harga * $cart->prod_qty; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                    <h5>Total : Rp. {{ $total }}</h5>
                    <button class="btn btn-danger float-end delete-cart" style="border-radius: 20px;"><i class="bi bi-trash">Remove</i></button>
                    <input type="hidden" class="prod_id" value="{{ $cart->prod_id }}">
                </div>
                <hr>
                @php $totals += $cart->produks->harga * $cart->prod_qty; @endphp
                @endforeach
                <div class="total float-end">
                    <h5>Total Semua Rp. {{ $totals }}</h5>
                    <a href="" class="btn btn-keranjang align-center float-end" style="background-color: #FFB716;">Pesan</a>
                </div>
            </div>

            @else
            <div class="card-body text-center">
                <h2>Keranjang<i class="bi bi-cart"></i>Anda Kosong!</h2>
                <br>
                <a href="{{url('shop')}}" class="btn btn-keranjang align-center" style="background-color: #FFB716;">Continue Shopping</a>
            </div>
            @endif

        </div>
    </div>
</div>
    @include('layouts.script')
@endsection
