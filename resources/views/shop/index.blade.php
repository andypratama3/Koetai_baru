@extends('layouts.user')
@section('title', 'Shop')
@section('content')
<div class="container-belanja produk_data">
    <nav class="nav-belanja">
        <ul>
            <li class="belanja-baju active" id="nav-baju">BAJU</li>
            <li class="belanja-mchan" id="nav-mchan">Tote Bag</li>
            <li class="belanja-mchan" id="nav-mchan">Acc</li>
        </ul>
    </nav>

    <div class="isi-belanja" id="isi-belanja">
        <div class="belanja-baju" id="belanja-baju">
            @foreach ($shops as $shop)
            <!-- BELANJA BAJU -->
            <div class="produk " data-bs-toggle="modal" data-bs-target="#modalss" id="details" data-id="<?=$shop->id ?>"
                data-nama="<?=$shop->nama ?>" data-harga="<?=$shop->harga ?>" data-foto="<?=$shop->foto ?>"
                data-stock="<?=$shop->stock ?>">
                <div class="gambar-produk">
                    <img src="{{ asset('storage/img/produk/'.$shop->foto) }}" alt="Produk Baju 1" class="">
                </div>
                <div class="konten-bawah">
                    <p class="teks nama-produk">{{ $shop->nama }}</p>
                    <p class="teks harga">Rp. {{ $shop->harga }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- MODAL BAJU -->
    <div class="modal fade detail" id="modalss" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-konten">
                <div class="modal-body">
                    <button type="button" class="tutup-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="produk-klik" id="produk-klik">
                        <div class="konten-atas">
                            <img src="" id="foto" alt="Gambar Modal" >
                            <div class="teks-gambar">
                                <input type="hidden" id="id" class="prod_id">
                                <h2 id="nama"></h2>
                                <td>Rp . <span id="harga"></span></td>
                                <br>
                                <td> Stok : <span id="stock"></span></td>
                            </div>
                        </div>
                        <div class="konten-bawah">
                            <div class="ukuran">
                                <p>Ukuran</p>
                                <select name="" id="" class="radio-inputs prod_ukuran text-center" style="color :beige">
                                    <option disabled>Pilih Ukuran</option>
                                    <option value="L">L</option>
                                    <option value="XL">Xl</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="jumlah">
                                <h2>jumlah: </h2>
                                <input type="number" min="1" max="100" value="1" class="form-custom prod_qty text-center">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-bawah">
                    <div class="tombolnya">
                        @if (Route::has('login'))
                        @auth
                        <button value="atc" class="btn-atc btncart">
                            <i class='bx bx-cart-add bx-md ikon'></i>
                            <span class="teks-checkout">Tambahkan Ke Keranjang</span>
                        </button>
                        <button value="beli" class="btn-beli teks-checkout btn-beli btn-checkout-form">Beli
                            Sekarang</button>
                        @else
                        <button class="btn-beli teks-checkout"><a href="{{ route('login') }}"
                                style="text-decoration:none; color: black;"> Masuk Sekarang</a></button>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.script')
@endsection
