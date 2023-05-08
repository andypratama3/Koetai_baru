<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link href="{{ asset('dashboard_assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title>Home</title>
</head>
<style>
    .portfolio-menu {
        text-align: center;
    }

    .portfolio-item {
        /*width:100%;*/
    }

    .portfolio-item .item {
        /*width:303px;*/
        float: left;
        margin-bottom: 10px;
    }
</style>


<body>
    <div class="background">
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light py-0">
            <div class="container-fluid">
                <a href="#" class="navbar-brand fs-6 col-md-6 fs-4" style="font-weight: bold">
                    <img src="assets/img/kms-vol2.png" class="kms-vol2" alt="..." />
                    KOETAI MAHKOTA SOUNDLINE
                </a>
                <button class="navbar-toggler my-0 border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link bttn bttn-pesanTiket my-1 mx-1 py-1" aria-current="page" href="#">Pesan
                                Tiket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bttn bttn-shop my-1 mx-1 py-1" href="">Shop</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section 1 -->
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-6 thumb-gede">
                    <img src="assets/img/makna-logo.png" class="w-100" alt="" />
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col col-md-12 thumb-sege">
                            <!-- Slides with indicators -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach ($events as $key => $event)
                                    <button type="button" data-bs-target="#carouselExampleIndicators{{ $key }}"
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 thumb-kecil d-flex justify-content-center">
                            <img src="assets/img/edisi-lebaran.png" alt="" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" />
                        </div>
                        <div class="col col-md-6 thumb-kecil d-flex justify-content-center">
                            <img src="assets/img/about-us.png" alt="" />
                        </div>
                    </div>
                </div>
                <!-- Sponsor -->
                <div class="container-fluid">
                    <div class="container d-flex justify-content-center">
                        <div class="teks-sponsor">
                            <h2>Sponsor</h2>
                            <div class="col-lg-2 col-md-4 col-6 d-flex">
                                @foreach ($sponsors as $sponsor)
                                <img src="{{ asset('storage/img/sponsor/'. $sponsor->logo) }}" class="img-fluid" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body" >
                <div class="container">
                    <div class="row">
                        <div class="portfolio-item row">
                            @foreach ($anggotas as $anggota)
                            <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                                <a href="{{  asset('storage/img/Anggota/' . $anggota->foto)  }}"
                                    class="fancylight popup-btn" data-fancybox-group="light">
                                    <img class="img-fluid" src="{{  asset('storage/img/Anggota/' . $anggota->foto)  }}"
                                        alt="">
                                </a>
                                <div class="">{{ $anggota->devisi }}</div>
                                <div class="">{{ $anggota->instagram }}</div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                <center>
                    <button type="button" class="btn btn-secondary text-center" data-bs-dismiss="modal">Close</button>
                </center>

            </div>
        </div>
    </div>

</html>
