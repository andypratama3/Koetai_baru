@extends('layouts.user')
@section('title','Home')
@section('content')

<main>
    <div class="container-beranda">
        <div class="container-kiri">
            <div class="isinya">
                <img src="{{ asset('asset_user/assets/img/thumb-tenkita.png')}}" alt="" class="img-carsoul">
            </div>
        </div>
        <div class="container-kanan">
            <div class="carousel-swiper">
                <div class="carouselnya">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($events as $event)
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <a href="{{ route('detail.event.show',$event->slug) }}">
                                    <img src="{{ asset('storage/img/event/'.$event->foto) }}" alt="" class="img-carsoul">
                                </a>
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
</main>

<section class="sponsor">
    <div class="container">
        <h1>SPONSOR</h1>

        <div class="sponsor-utama">
            <img src="{{ asset('asset_user/assets/img/sponsor1.png') }}" alt="" srcset="">
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
