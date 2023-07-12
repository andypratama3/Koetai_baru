@extends('layouts.user')
@section('title', 'Tiket')

@section('content')
<main>
    <div class="container-pesantik">
        <div class="pesantik-atas">
            <img src="{{ asset('asset_user/assets/img/logo-kms1.png') }}" alt="">
            <h1>PESAN TIKET</h1>
        </div>
        <div class="pesantik-menu pesan_tiket">
            <div class="form-menu">
                <div class="pilihan">
                    <div class="pesantik-menu">
                        <form action="checkout-tiket" method="post">
                            @csrf
                        <div class="form-menu">
                            <div class="pilihan">
                                @php
                                $total = 0;
                                @endphp
                                <div class="label-pesantik">Nama</div>
                                <input type="text" name="nama" id="nama" placeholder="nama" class="form-control nama">
                                <br>
                                <div class="label-pesantik">Jenis Tiket</div>

                                <select name="tiket_id" class="form-select form-control tiket_id ">
                                    <option>Pilih Tiket</option>
                                    @foreach ($tikets as $tiket)
                                    @if ($tiket->stok > 0 )
                                        <option value="{{ $tiket->id }}" id="harga_tiket" data-harga="<?=$tiket->harga ?>">
                                        {{ $tiket->kategori }} || Harga Rp.
                                        {{ $tiket->harga }}
                                        <p class="float-end">Stock  : {{ $tiket->stok }}</p>
                                    </option>
                                    @else
                                    <h2>Tiket Telah Habis</h2>
                                    @endif
                                    @endforeach
                                    <span id="harga"></span>
                                    <i class="bx bx-chevron-down"></i>
                                </select>
                                <div class="label-pesantik">Jumlah</div>
                                <input type="number" id="jumlah" name="jumlah" min="0" class="form-control qty" id="jumlah"
                                    placeholder="Jumlah">
                                <br>
                                <div class="tombol-pesantik">
                                    <button type="submit" class="btn-pesan pay-button">Pesan Tiket</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.script')

@endsection
