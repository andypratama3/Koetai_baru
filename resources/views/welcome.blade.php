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
          <div class="carousel-swiper">
            <!-- Slider main container -->
            <div class="carouselnya">
                <!-- Slider main container -->
              <div class="swiper">
                <!-- Additional required wrapper -->

                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                  <!-- Slides -->
                  <div class="swiper-slide">
                    <img src="{{ asset('storage/img/event/'.$event->foto) }}" alt="" class="img-fluid">
                  </div>
                  @endforeach
                </div>

                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                {{-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> --}}

                <!-- If we need scrollbar -->
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
<script>
    const swiper = new Swiper('.swiper', {
  autoplay: {
    delay: 2000,
  },
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    type: "bullets",
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
  </script>
@endsection
