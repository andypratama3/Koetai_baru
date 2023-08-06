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
                                    <h1>{{ $event->nama }}</h1>
                                    <a class="btn btn-primary"
                                        href="{{ route('detail.event.show',$event->slug) }}">Selengkapnya</a>
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
        <div class="sponsor-utama">
            @foreach ($sponsors as $sponsor)
            @if ($sponsor->nama == 'phm')
            <img src="{{ asset('storage/img/sponsor/' .$sponsor->logo) }}" alt="">
            @endif
            @endforeach
        </div>
        <div class="sponsor-lainnya">
            @foreach ($sponsors as $sponsor)
            @if ($sponsor->nama != 'phm')
            <img src="{{ asset('storage/img/sponsor/' .$sponsor->logo) }}" alt="">
            @endif
            @endforeach
        </div>    
    </div>
</section>

@include('layouts.script')

@endsection