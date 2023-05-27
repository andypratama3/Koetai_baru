@extends('layouts.user')
@section('title', 'Shop')
@section('content')

<div class="container-belanja">
    {{-- <div class="isi-belanja produk_data" id="isi-belanja  ">
        <!-- <div class="container-isi"> -->
        <div class="belanja-baju" id="belanja-baju">
                    @if ($carts->count() > 0)
                        @php $total = 0; @endphp
                        @foreach ($carts as $item)
                        <div class="row" style="background-color: white;">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('storage/img/produk/'.$item->produks->foto) }}" style="width: 80%" alt="">
                        </div>
                        <div class="col-md-8">

                            <h2 class="mb-0">
                                {{ $item->produks->nama }}
                            </h2>
                            <hr>
                            <button class="btn btn-danger float-end delete-cart"><i class="bi bi-trash">Remove</i></button>
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            <label class="me-3">Harga: <s> Rp.{{ $item->produks->harga }}</s></label>
                            <i class="bi bi-arrow-right"></i>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <input type="hidden" class="prod_id" value="">
                                    @if($item->produks->stock > $item->prod_qty)
                                    <label for="Quantity">Jumlah</label>
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text  decrement-btn">-</button>
                                        <input type="text" name="quantity " value="{{ $item->prod_qty }}" class="form-control text-center qty-input">
                                        <button class="input-group-text  incerement-btn" style="size: 5px;">+</button>
                                    </div>
                                    @php $total += $item->produks->harga * $item->prod_qty; @endphp
                                    @else
                                    <h6>Out Of Stock</h6>
                                @endif
                            </div>

                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div>
                        <a href="{{url('checkout')}}" class="btn btn-primary float-end">Proceed Check Out</a>
                        <h2>Total Rp.{{$total}}</h2>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <h2>Your <i class="bi bi-cart"></i> Cart is empty</h2>
                        <a href="{{url('shop')}}" class="btn btn-success float-end">Continue Shopping</a>
                    </div>
                    @endif
                    </div>
                </div>
            </div>
    </div> --}}
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
