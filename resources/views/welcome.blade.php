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
                                <div class="hover-content">
                                    <h1>Title</h1>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<section class="sponsor">
    <div class="container">
        <h1>SPONSOR</h1>
        @foreach ($sponsors as $spons)
        <div class="sponsor-utama">
            <img src="{{ asset('storage/img/sponsor/'.$spons->logo) }}" alt="" srcset="">
        </div>
        <div class="sponsor-lainnya">
            <img src="{{ asset('storage/img/sponsor/'.$spons->logo) }}" alt="" srcset="">
        </div>
        @endforeach
    </div>
</section>
@include('layouts.script')

@endsection
