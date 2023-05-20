@extends('layouts.user')
@section('title','Home')
@section('content')

<main>
    <div id="container">

        <div class="container-beranda item">

            <div class="container-kiri">
                <img src="{{ asset('asset_user/assets/img/thumb-tenkita.png')}}" alt="">
            </div>
            <div class="container-kanan">
                <div class="carouselnya">
                    {{-- carsoul --}}
                    <div class="slides-row">
                        <div class="carousel-indicators">
                            @foreach ($events as $key => $event)
                            <button  class="next" type="button" data-bs-target="#slides-row{{ $key }}"
                                data-bs-slide-to="{{ $key }}" class="{{ !$loop->first ?: 'active' }}"
                                aria-current="true" aria-label="{{ $key }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($events as $event)
                            <div class="carousel-item {{ !$loop->first ?: 'active' }} ">
                                <img class="d-block w-100" src="{{ asset('storage/img/event/'. $event->foto) }}"
                                    alt="">
                            </div>
                            @endforeach
                        </div>
                </div>

                <div class="couple-container-kanan">
                    <div class="dots">
                        <div class="dot active"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <h3>CALL FOR SPONSORED <br> 08XXXXXXXXXX</h3>
                </div>

            </div>

        </div>

    </div>
</main>

<section id="sponsor">
    <div class="container">
        <h1>SPONSOR</h1>
        <div class="sponsor-utama">
            <img src="{{ asset('asset_user/assets/img/sponsor1.png')}}">
        </div>
        <div class="sponsor-lainnya">
            @foreach ($sponsors as $sponsor)
            <img class="d-block w-100" src="{{ asset('storage/img/sponsor/'. $event->poto) }}">
            @endforeach
        </div>
    </div>
</section>
@endsection
