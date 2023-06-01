@extends('layouts.user')
@section('title', 'Tiket')

@section('content')
<main>
    <div class="container">
        <div class="container-pesantik">
            <div class="pesantik-atas">
                <img src="assets/img/logo-kms1.png" alt="">
                <h1>PESAN TIKET</h1>
            </div>
            <div class="pesantik-menu pesan_tiket">
                <div class="form-menu">
                    <div class="pilihan">
                        <div class="pesantik-menu">
                            <div class="form-menu">
                                <div class="pilihan">
                                    @php
                                        $total = 0;
                                    @endphp
                                    {{-- <form action="tiket-order" method="POST"> --}}
                                        {{-- @csrf --}}
                                        <div class="label-pesantik">Nama</div>
                                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control nama">
                                        <br>
                                        <div class="label-pesantik">Jenis Tiket</div>

                                        <select name="tiket_id"  class="form-select form-control tiket_id ">
                                            <option disabled>Pilih Tiket</option>
                                            @foreach ($tikets as $tiket)
<<<<<<< HEAD
                                            <option value="{{ $tiket->id }}">{{ $tiket->kategori }} || Harga Rp.
                                                {{ $tiket->harga }}</option>
                                                {{-- <input type="hidden" name="harga" value="{{ $tiket->harga }}" class="harga"> --}}
=======
                                            <option value="{{ $tiket->id }}" id="harga_tiket" data-harga="<?=$tiket->harga ?>">{{ $tiket->kategori }} || Harga Rp. {{ $tiket->harga }}</option>
>>>>>>> ab7c1f31f893bbcc8d60489f88e4cc94d37e1305
                                            @endforeach
                                            <span id="harga"></span>
                                            <i class="bx bx-chevron-down"></i>
                                        </select>
                                        <div class="label-pesantik">Jumlah</div>
                                        <input type="number" id="jumlah" name="jumlah" class="form-control qty" id="jumlah">
                                        <br>
                                        <button type="submit" class="btn btn-primary pesan-tiket pay-button">Pesan Tiket</button>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.script')

@endsection
