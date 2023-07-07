@extends('layouts.user')
@section('title', 'Checkout')
<style>
    .text-error {
        color: #FFB716;
    }
</style>
@section('content')

<div class="container-belanja cartitems">
    <div class="main-keranjang">
        <div class="container-keranjang">
            <div class="isinya">
                <h1>Checkout</h1>
                @if ($carts->count() > 0)
                @php $totals = 0; @endphp
                @foreach ($carts as $cart)
                @php $total = 0; @endphp
                <div class="text-produk">Produk Dipesan</div>
                <div class="list-produk-checkout produk_data">
                    <div class="produk">
                        <img src="{{ asset('storage/img/produk/'.$cart->produks->foto) }}" alt="">
                        <p>{{ $cart->produks->nama }}</p>
                    </div>
                    <div class="ukuran">
                        <div class="ukuran-content">

                            <p>Ukuran</p>

                            <p>Variasi</p>

                            <p class="variasi">{{ $cart->prod_ukuran }}</p>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $cart->prod_id }}" class="prod_id">
                    <div class="jumlah">
                        <div class="jumlah-produk">
                            <input class="no qty-input" type="text" name="quantity " value="{{ $cart->prod_qty }}">

                            <p><b>{{ $cart->prod_ukuran }}</b></p>
                        </div>
                    </div>
                    <div class="harga">
                        <div class="harga-content">
                            <p class="text-content">Subtotal Produk</p>
                            <p>Rp. Harga Produknya Ndyy</p>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $cart->prod_id }}" class="prod_id">
                    <div class="jumlah">
                        <div class="jumlah-content">
                            <p class="text-content">Jumlah</p>
                            <input class="no qty-input" type="text" name="quantity " value="x{{ $cart->prod_qty }}">
                        </div>
                    </div>
                    @php $total += $cart->produks->harga * $cart->prod_qty; @endphp

                    <div class="harga">
                        <div class="harga-content">
                            <p class="text-content">Subtotal Produk</p>
                            <p>Total : Rp. {{ $total }}</p>
                        </div>
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
                    <input type="hidden" class="total_pesanan" value="{{$totals}}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_penerima" class="nama" id="nama"
                        placeholder="Nama">
                    <span class="text-error nama_penerima"></span>
                </div>
                <div class="mb-3">
                    <label for="nomor_telpon" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" id="nomor_telpon" class="no_telp"
                        placeholder="nomor_telpon">
                        <span class="text-error nomor_telpon"></span>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" cols="30" id="alamat"
                        placeholder="Alamat Detail"></textarea>
                    <span class="text-error alamat"></span>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control" name="" cols="30" id="catatan"
                        placeholder="Pesan Singkat"></textarea>
                </div>
                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran:</label>
                    <select id="payment_method" name="payment_method" class="payment-method text-center payment_method">
                        <option value="COD">COD</option>
                        <option value="bayar_sekarang">Bayar Sekarang</option>
                    </select>
                <div class="input-checkout">
                    <div class="top-content">
                        <div class="left-input">
                            <input type="text" class="input-name nama" name="Nama Penerima" id="nama" placeholder="Nama">
                            <span class="text-error nama_penerima"></span>
                            <input type="number" class="input-number no_telp" id="nomor_telpon" max="0" placeholder="Nomor Telepon">
                        </div>
                        <div class="right-input">
                            <textarea class="input-address" name="alamat" cols="30" id="alamat"
                                placeholder="Alamat Detail"></textarea>
                            <span class="text-error alamat"></span>
                        </div>
                    </div>
                    <div class="bottom-content">
                        <div class="message-content">
                            <label for="pesan">Pesan:</label>
                            <textarea class="input-message" name="" cols="30" id="pesan"
                                placeholder="(Opsional) Tambahkan Pesan Ke Penjual"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Metode Pembayaran:</label>
                        <select id="payment_method" name="payment_method"
                            class="payment-method text-center payment_method">
                            <option value="COD">COD</option>
                            <option value="bayar_sekarang">Bayar Sekarang</option>
                        </select>
                    </div>
                </div>
                <br>
                <p class="float-end">Total Semua : Rp. {{ $totals }}</p>
                <br>
                <br>
                <button class="btn btn-warning btn-lg btn-keranjang align-center float-end proses-checkout">Proses
                    Pesanan</button>
            </div>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Produk Untuk Di Checkout<i class="bi bi-cart"></i> Anda Kosong!</h2>
            <br>
            <a href="{{url('shop')}}" class="btn btn-warning btn-keranjang align-center">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>
@include('layouts.script')

@endsection
