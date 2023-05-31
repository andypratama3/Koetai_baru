<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="{{ asset('asset_user/assets/img/logo-kms1.png') }}" rel="icon">
    <link href="{{ asset('asset_user/assets/img/logo-kms1.png') }}" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{ asset('asset_user/assets/css/style.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('asset_user/assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
    @stack('css')
    <link rel="stylesheet" href="sweetalert2.min.css">


    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_Key') }}"></script>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset_user/vendor/glightbox/css/glightbox.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

</head>

<body>
    <div class="blur-kuning"></div>
    <img src="{{ asset('asset_user/assets/img/logo-kms4.png')}}" class="logo-kms-kuning">

    <header>
        <nav class="nav-bar">
            <a href="/" class="teks-kms">KOETAI MAHKOTA SOUNDLINE</a>
            <ul>
                <li>
                    <a href="/">
                        <button class="{{ request()->is('/') ? 'active' : '' }} tombol-nav">Beranda</button>
                    </a>
                </li>
                <li>
                    <a href="/crew">
                        <button class="{{ request()->is('crew') ? 'active' : '' }} tombol-nav">Semua Tim</button>
                    </a>
                </li>
                <li>
                    <a href="/shop">
                        <button class="{{ request()->is('shop') ? 'active' : '' }} tombol-nav">Belanja</button>
                    </a>
                </li>
                <li>
                    <a href="/cart">
                        <button class="{{ request()->is('cart') ? 'active' : '' }} tombol-nav">
                            <i class='bx bx-cart cart-icon'></i>
                            <p>Keranjang</p>
                            {{-- //pokoknya pake class yang udah ku buat --}}
                            <span class="badge badge-pill cart-count">0</span>
                        </button>
                    </a>
                </li>
            </ul>
            <ul class="menu-nav">
                <div class="drop-down-tiket">
                    <button onclick="pilihTiket" class="pilih-btn">Tiket</button>
                    <div id="pilih-tiket" class="drop-down-konten">
                        <a href="/tiket">Tiket</a>
                        <a href="/orderan-tiket">Pesanan Tiket</a>
                    </div>
                </div>

                {{-- <li>
                    <a href="/tiket">
                        <button class="{{ request()->is('/tiket') ? 'active' : '' }} tombol-nav">Tiket</button>
                </a>
                </li> --}}
                @if (Route::has('login'))
                <li>
                    <a href="{{ route('login') }}">
                        <button class="{{ request()->is('/login') ? 'active' : '' }} tombol-nav">Login</button>
                    </a>
                </li>


                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            @csrf
                            <button class="{{ request()->is('/logout') ? 'active' : '' }}">Log Out</button>
                        </a>
                    </form>
                </li>
                @endif
            </ul>
            <div class="tombol-menu">
                <i class="bx bx-menu"></i>
            </div>
        </nav>

        <div class="dropdown-menu">
            <li>
                <a href="/">
                    <button class="{{ request()->is('/login') ? 'active' : '' }} tombol-nav">Beranda</button>
                </a>
            </li>
            <li>
                <a href="/crew">
                    <button class="{{ request()->is('/crew') ? 'active' : '' }} tombol-nav">Semua Tim</button>
                </a>
            </li>
            <li>
                <a href="/shop">
                    <button class="{{ request()->is('/shop') ? 'active' : '' }} tombol-nav">Belanja</button>
                </a>
            </li>
            <li>
                <a href="/tiket">
                    <button class="{{ request()->is('/tiket') ? 'active' : '' }}">Tiket</button>
                </a>
            </li>
            <li>
                <a href="/login">
                    <button class="{{ request()->is('/shop') ? 'active' : '' }} tombol-nav">Login</button>
                </a>
            </li>
        </div>
    </header>

    @yield('content')

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="{{ asset('asset_user/assets/js/script.js')}}"></script>
    <script src="{{ asset('asset_user/assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('asset_user/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('asset_user/vendor/glightbox/js/glightbox.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    @stack('js')

</body>

</html>
