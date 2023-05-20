@extends('layouts.user')
@section('title','Shop')
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
                <div class="isi-belanja">
                    <div class="container-isi">
                        @foreach ($produks as $produk)
                        <div class="produk">
                            <img src="{{ asset('storage/img/produk/'. $produk->foto) }}" alt="Produk Baju 1">
                            <div class="konten-bawah">
                                <div class="teks nama-produk">{{ $produk->nama }}</div>
                                <div class="teks harga">Rp.{{ $produk->harga }}</div>
                            </div>
                            {{-- <a href="{{ route('') }}">Beli</a> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
