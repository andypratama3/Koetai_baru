@extends('layouts.user')
@section('title', 'Shop')
@section('content')
    <style>
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        @media (prefers-reduced-motion:reduce) {
            .form-control {
                transition: none
            }
        }
    </style>
    <main>
        <div id="container">
            <div class="container-pesantik">
                <div class="pesantik-atas">
                    <img src="{{ asset('asset_user/assets/img/logo-kms1.png') }}" alt="">
                    <h1>PESAN TIKET</h1>
                    @include('layouts.flash-message')
                </div>
                <div class="pesantik-menu">
                    <div class="form-menu">
                        <div class="pilihan">
                            <form action="{{ route('tiket.store') }}" method="POST">
                                @csrf
                                <div class="label-pesantik">Nama</div>
                                <input type="text" name="nama" id="nama" placeholder="nama" class="form-control">
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
                                <input type="number" name="jumlah" class="form-control">

                                <button type="reset" class="checkout">Reset</button>
                                <button type="submit" class="checkout">Pesan Tiket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
