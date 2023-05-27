@extends('layouts.user')
@section('title','Home')
@section('content')

<main>
    <div class="container-fluid container">

      <div class="container-beranda">

        <div class="container-kiri">
          <img src="{{ asset('asset_user/assets/img/thumb-tenkita.png')}}" alt="">
        </div>
        <div class="container-kanan">
          <div class="carouselnya">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">

                @foreach ($events as $key => $event)
                    <li data-target="#carouselExampleIndicators{{ $key }}" data-slide-to="{{ $key }}" class="{{ !$loop->first ? : 'active' }}"></li>
                @endforeach
              </div>
              <div class="carousel-inner">
                @foreach ($events as $event)
                    <div class="carousel-item {{ !$loop->first ?: 'active' }}">
                      <img src="{{ asset('storage/img/event/'.$event->foto) }}" alt="">
                    </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <h3>CALL FOR SPONSORED <br> 08XXXXXXXXXX</h3>
        </div>

      </div>
    </div>
  </main>

  {{-- <section class="sponsor">
    <div class="container">
      <h1>SPONSOR</h1>
      <div class="sponsor-utama">
        @foreach ($sponsor as $spon)
        <img src="{{ asset('storage/img/sponsor/'.$spon->logo) }}">
        @endforeach

      </div>
      <div class="sponsor-lainnya">
        @foreach ($sponsors as $sponsor)
        <img src="{{ asset('storage/img/sponsor/'.$sponsor->logo) }}">
        @endforeach
      </div>
    </div>
  </section> --}}


@include('layouts.script')

<script></script>
@endsection
