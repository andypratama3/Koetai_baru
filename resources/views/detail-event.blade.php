@extends('layouts.user')
@section('title','Detail Event')
@section('content')

<main>
    {{-- <div class="card" style="background: ">
        <div class="card-body">
            <h5 class="card-title">Detail Event</h5>
            <p class="card-text">{{ $event->nama }}</p>
            <img src="{{ asset('storage/img/event/'.$event->foto) }}" alt="" class="img-carsoul">
        </div>
        <div class="card-body">
            <h2>Detail Hari</h2>
            <p>Tanggal Mulai Dan Jam  : {{ $event->tanggal_mulai }}</p>
            <p>Tanggal Selesai Dan Jam  : {{ $event->tanggal_mulai }}</p>
        </div>
        <div class="card-body">
            <h2>Guestar</h2>
            @foreach ($event->talents as $talent)
            <p>{{ $talent->nama }}</p>
            @endforeach
        </div>
        <div class="card-body">
            @foreach ($tikets as $tiket)
            <p>Kategori Tiket : {{ $tiket->kategori }}  || Tiket Tersedia:  {{ $tiket->stok }}</p>
            @endforeach
        </div>


        <div class="footer-card text-center">
            <a href="{{ route('tiket.index') }}" class="btn btn-danger">Kemali</a>
            <a href="{{ route('tiket.index') }}" class="btn btn-primary">Beli Tiket</a>
        </div>
    </div> --}}
    <div class="container-semtim">
        <div class="isi-semtim">
            <div class="isinya">
                <div class="title-detail d-flex">
                    <h2>Detail Event</h2>
                    <img src="{{ asset('asset_user/assets/img/kms-vol2.png')}}" alt="">
                </div>
                <div class="selected-carousel">
                    <img src="{{ asset("asset_user/assets/img/never.jpeg")}}" alt="" class="carousel-content">
                </div>
                <div class="content-detail">
                    <div class="datetime">
                        <p>27 Juli 2023</p>
                        <p>17.00 - 21.30</p>
                    </div>
                    <div class="category">
                        <p>Kategori Tiket</p>
                        <p>Day 1</p>
                        <p>Day 2</p>
                    </div>
                    <div class="guest">
                        <p>Guest Star</p>
                        <p>HIVI</p>
                        <p>ARDITO PRAMONO</p>
                        <p>RICH BRIAN</p>
                        <p>BLACK PINK</p>
                        <p>HIVI</p>
                        <p>ARDITO PRAMONO</p>
                        <p>RICH BRIAN</p>
                        <p>BLACK PINK</p>
                        <p>HIVI</p>
                        <p>ARDITO PRAMONO</p>
                        <p>RICH BRIAN</p>
                        <p>BLACK PINK</p>
                        <p>HIVI</p>
                        <p>ARDITO PRAMONO</p>
                        <p>RICH BRIAN</p>
                        <p>BLACK PINK</p>
                        <p>HIVI</p>
                        <p>ARDITO PRAMONO</p>
                        <p>RICH BRIAN</p>
                        <p>BLACK PINK</p>
                    </div>
                    <div class="action">
                        <div class="bttn-container">
                        <a href="{{ route('index') }}" class="bttn btn btn-danger" style="border-radius: 7px; padding: 5px 0;">Kembali</a>
                        <a href="{{ route('tiket.index') }}" class="bttn btn btn-primary mt-3" style="border-radius: 7px; padding: 5px 0;">Beli Tiket</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
