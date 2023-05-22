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
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/img/thumb-comsoon.gif" class="" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/logo-kms1.png" class="" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/logo-kms2.png" class="" alt="...">
                </div>
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

  <section class="sponsor">
    <div class="container">
      <h1>SPONSOR</h1>
      <div class="sponsor-utama">
        <img src="assets/img/sponsor1.png">
      </div>
      <div class="sponsor-lainnya">
        <img src="assets/img/sponsor2.png">
        <img src="assets/img/sponsor3.png">
        <img src="assets/img/sponsor4.png">
        <img src="assets/img/sponsor5.png">
        <img src="assets/img/sponsor6.png">
        <img src="assets/img/sponsor7.png">
      </div>
    </div>
  </section>


@endsection
