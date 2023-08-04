@extends('layouts.user')
@section('title','Detail Event')
@section('content')

<main>
    <div class="container-semtim">
        <div class="isi-semtim">
            <div class="isinya">
                <div class="title-detail d-flex">
                    <h2>Detail {{ $event->nama }}</h2>
                    <img src="{{ asset('asset_user/assets/img/kms-vol2.png')}}" alt="">
                </div>
                <div class="selected-carousel">
                    <img src="{{ asset('storage/img/event/'.$event->foto)}}" alt="" class="carousel-content">
                </div>
                <div class="content-detail">
                    <div class="datetime">
                        <p>{{ $event->tanggal_mulai }}</p>
                        <p>{{ $event->tanggal_selesai }}</p>

                    </div>
                    <div class="category">
                        <p>Kategori Tiket</p>
                        @foreach ($tikets as $tiket)
                        <p>{{ $tiket->kategori }} || Tersedia : {{ $tiket->stok }}</p>
                        @endforeach
                    </div>
                    <div class="guest">
                        <p class="title-guest">Guest Star</p>
                        @foreach ($event->talents as $talent)
                        <p>{{ $talent->nama }}</p>
                        @endforeach
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
