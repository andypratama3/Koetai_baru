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

    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_Key') }}"></script>
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
                        <button class="{{ request()->is('/') ? 'active' : '' }} btn-nav">Beranda</button>
                    </a>
                </li>
                <li>
                    <a href="/tentang">
                        <button class="{{ request()->is('tentang') ? 'active' : '' }} btn-nav">Tentang</button>
                    </a>
                </li>
                {{-- <li>
                    <a href="/crew">
                        <button class="{{ request()->is('crew') ? 'active' : '' }} btn-nav">Semua Tim</button>
                </a>
                </li> --}}
                <li>
                    <a href="/shop">
                        <button class="{{ request()->is('shop') ? 'active' : '' }} btn-nav">Belanja</button>
                </a>
                </li>
                <li>
                    <a href="/cart">
                        <button class="{{ request()->is('cart') ? 'active' : '' }} btn-nav">
                <i class='bx bx-cart cart-icon'></i>
                <p>Keranjang</p>
                <span class="badge badge-pill cart-count">0</span>
                </button>
                </a>
                </li>
                <li>
                    <a href="/tiket">
                        <button class="{{ request()->is('tiket') ? 'active' : '' }} btn-pilih btn-nav" id="btn-tiket">Tiket</button>
                    </a>
                </li>
                <li>
                    <a href="/orderan-tiket">
                        <button class="{{ request()->is('orderan-tiket') ? 'active' : '' }} btn-nav">Pesanan Tiket</button>
                    </a>
                </li>
                {{-- <li class="dropdown-pesanan">
                    <button class="btn-pilih btn-nav">Pesanan</button>
                    <div class="dropdown-content">
                        <a href="/orderan-tiket">
                            <button class="pesanan-content">Pesanan Tiket</button>
                        </a>
                        <a href="/order-shop">
                            <button class="pesanan-content">Pesanan Belanja</button>
                        </a>
                    </div>
                </li> --}}
                @if(auth()->check())
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            @csrf
                            <button class="{{ request()->is('/logout') ? 'active' : '' }} btn-nav">Log Out</button>
                        </a>
                    </form>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}">
                        <button class="{{ request()->is('/login') ? 'active' : '' }} btn-nav">Login</button>
                    </a>
                </li>
                @endif
            </ul>

            <div class="tombol-menu">
                <i class="bx bx-menu"></i>
            </div>
        </nav>

        {{-- Responsive Navbar --}}
        <div class="side-bar">
            <div class="sidebar-img">
                <img src="{{ asset('asset_user/assets/img/logo-kms1.png')}}">
            </div>
            <div class="container-dropdown">
                <li>
                    <a href="/">
                        <button class="{{ request()->is('/login') ? 'active' : '' }} list-content">Beranda</button>
                    </a>
                </li>
                {{-- <li>
                    <a href="/crew">
                        <button class="{{ request()->is('/crew') ? 'active' : '' }} list-content">Semua Tim</button>
                </a>
                </li> --}}
                <li>
                    <a href="/shop">
                        <button class="{{ request()->is('/shop') ? 'active' : '' }} list-content">Belanja</button>
                </a>
                </li>
                <li>
                    <a href="/cart">
                        <button class="{{ request()->is('/cart') ? 'active' : '' }} list-content">Keranjang</button>
                </a>
                </li>
                <li>
                    <a href="/tiket">
                        <button class="list-content" id="btn-tiket">Tiket</button>
                    </a>
                </li>
                <li>
                    <a href="/orderan-tiket">
                        <button class="list-content">Pesanan Tiket</button>
                    </a>
                </li>
                {{-- <li class="dropdown-pesanan">
                    <button class="list-content btn-pilih">Pesanan</button>
                    <div class="dropdown-content">
                        <a href="/orderan-tiket">
                            <button class="list-content pesanan-content">Pesanan Tiket</button>
                        </a>
                        <a href="/order-shop">
                            <button class="list-content pesanan-content">Pesanan Belanja</button>
                        </a>
                    </div>
                </li>  --}}
                @if(auth()->check())
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            @csrf
                            <button class="{{ request()->is('/logout') ? 'active' : '' }} list-content">Log Out</button>
                        </a>
                    </form>
                </li>
                @else
                <li>
                    <a href="/login">
                        <button class="{{ request()->is('/shop') ? 'active' : '' }} list-content">Login</button>
                    </a>
                </li>
                @endif
            </div>
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
