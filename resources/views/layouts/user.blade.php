
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('asset_user/assets/css/style.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('asset_user/assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <div class="blur-kuning"></div>
    <img src="{{ asset('asset_user/assets/img/logo-kms4.png')}}" class="logo-kms-kuning">

    <header>
        <nav class="nav-bar">
            <a href="/" class="teks-kms">KOETAI MAHKOTA SOUNDLINE</a>
            <ul class="menu-nav">
                <li>
                    <a href="/">
                        <button class="{{ request()->is('/') ? 'active' : '' }}" >BERANDA</button>
                    </a>
                </li>
                <li>
                    <a href="/shop">
                        <button class="{{ request()->is('shop') ? 'active' : '' }}" >BELANJA</button>
                    </a>
                </li>
                <li>
                    <a href="/cart">
                        <button class="{{ request()->is('cart') ? 'active' : '' }}" >
                            <box-icon name='cart' class="cart-icon"></box-icon>KERANJANG
                            <span class="badge badge-pill cart-count" style="background-color: red;">0</span>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <button>SEMUA TIM</button>
                    </a>
                </li>
            </ul>
            <ul class="menu-nav">
                <li>
                    <a href="/tiket">
                        <button class="{{ request()->is('/tiket') ? 'active' : '' }}" >TIKET</button>
                    </a>
                </li>
                <li>
                    <a href="/login">
                        <button class="{{ request()->is('/login') ? 'active' : '' }}" >LOGIN</button>
                    </a>
                </li>
            </ul>
            <div class="tombol-menu">
                <i class="bx bx-menu"></i>
            </div>
        </nav>

        <div class="dropdown-menu">
            <li>
                <a href="/">
                    <button class="{{ request()->is('/login') ? 'active' : '' }}" >BERANDA</button>
                </a>
            </li>
            <li>
                <a href="/shop">
                    <button class="{{ request()->is('/shop') ? 'active' : '' }}" >BELANJA</button>
                </a>
            </li>
            <li>
                <a href="/crew">
                    <button class="{{ request()->is('/crew') ? 'active' : '' }}" >SEMUA TIM</button>
                </a>
            </li>
            <li>
                <a href="/tiket">
                    <button class="{{ request()->is('/tiket') ? 'active' : '' }}" >TIKET</button>
                </a>
            </li>
            <li>
                <a href="/login">
                    <button class="{{ request()->is('/shop') ? 'active' : '' }}" >LOGIN</button>
                </a>
            </li>
        </div>
    </header>

   @yield('content')

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="{{ asset('asset_user/assets/js/script.js')}}"></script>
    <script src="{{ asset('asset_user/assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('asset_user/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    {{-- @include('layouts.script') --}}
</body>

</html>
