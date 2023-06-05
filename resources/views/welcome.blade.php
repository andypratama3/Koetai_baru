@extends('layouts.user')
@section('title','Home')
@section('content')

<main>
    <div class="container-fluid container">
      <div class="container-beranda">
        <div class="container-kiri">
          <img src="{{ asset('asset_user/assets/img/thumb-tenkita.png')}}" alt="" class="img-carsoul">
        </div>
        <div class="container-kanan">
          <div class="carousel-swiper">
            <div class="carouselnya">
              <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                  <!-- Slides -->
                  <div class="swiper-slide">
                    <img src="{{ asset('storage/img/event/'.$event->foto) }}" alt="" class="img-carsoul">
                  </div>
                  @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-scrollbar"></div>
              </div>
            </div>
          </div>
          <h3>CALL FOR SPONSORED <br> 08XXXXXXXXXX</h3>
        </div>

      </div>
    </div>
  </main>

  <section class="sponsor">
    <div class="container">
      <h1>SPONSOR</h1>

      <div class="sponsor-utama">
        @foreach ($sponsor as $spon)
        <img src="{{ asset('storage/img/sponsor/'.$spon->logo) }}" alt="" srcset="">
        @endforeach
      </div>
      <div class="sponsor-lainnya">
        @foreach ($sponsors as $spons)
        <img src="{{ asset('storage/img/sponsor/'.$spons->logo) }}" alt="" srcset="">
        @endforeach
      </div>

    </div>
  </section>



@include('layouts.script')

@endsection
