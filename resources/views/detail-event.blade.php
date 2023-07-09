@extends('layouts.user')
@section('title','Detail Event')
@section('content')

<main>
    <div class="card" style="background: ">
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
    </div>
</main>
@endsection
