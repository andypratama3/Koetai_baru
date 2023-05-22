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
            <div class="pesantik-menu">
                <div class="form-menu">
                    <div class="pilihan">
                        <div class="pesantik-menu">
                            <div class="form-menu">
                                <div class="pilihan">
                                    <form action="{{ route('tiket.store') }}" method="POST">
                                        @csrf
                                        <div class="label-pesantik">Nama</div>
                                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control">
                                        <br>
                                        <div class="label-pesantik">Jenis Tiket</div>
                                        <select name="tiket_id" id="" class="form-select form-control">

                                            <option value="">Pilih Tiket</option>
                                            @foreach ($tikets as $tiket)
                                            <option value="{{ $tiket->id }}">{{ $tiket->kategori }} || Harga Rp.
                                                {{ $tiket->harga }}</option>

                                            @endforeach
                                            <i class="bx bx-chevron-down"></i>
                                        </select>

                                        <div class="label-pesantik">Jumlah</div>
                                        <input type="number" name="jumlah" class="form-control" id="jumlah">
                                        <button type="submit" class="btn btn-primary checkout">Pesan Tiket</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
