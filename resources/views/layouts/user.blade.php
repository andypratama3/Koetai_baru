<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('asset_user/assets/css/style.css')}}"/>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
</head>

<body>
    <div class="blur-kuning"></div>
    <img src="{{ asset('asset_user/assets/img/logo-kms4.png')}}" class="logo-kms-kuning">
    <header>
        <nav id="navbar">
            <div class="teks-kms">KOETAI MAHKOTA SOUNDLINE</div>
            <ul class="menu-nav">
                <li>
                    <a href="/" >
                        <button class="{{ request()->is('/') ? 'active' : '' }}" >BERANDA</button>
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.index') }}">
                        <button class="{{ request()->is('shop') ? 'active' : '' }}">BELANJA</button>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}">
                        <button class="{{ request()->is('cart') ? 'active' : '' }}">Cart</button>
                    </a>
                </li>
                <li>
                    <a href="semtim.html">
                        <button class="{{ request()->is('tim') ? 'active' : '' }}">SEMUA TIM</button>
                    </a>
                </li>
            </ul>
            <ul class="menu-nav">
                <li>
                    <a href="{{ route('tiket.index') }}">
                        <button class="tombol-pesantik {{ request()->is('tiket') ? 'active' : '' }}">PESAN TIKET</button>
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        <button class="tombol-login {{ request()->is('login') ? 'active' : '' }}">LOGIN</button>
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
                    <button class="{{ request()->is('/') ? 'active' : '' }}">BERANDA</button>
                </a>
            </li>
            <li>
                <a href="/shop">
                    <button class="{{ request()->is('shop') ? 'active' : '' }}">BELANJA</button>
                </a>
            </li>
            <li>
                <a href="/">
                    <button class="{{ request()->is('tim') ? 'active' : '' }}">SEMUA TIM</button>
                </a>
            </li>
            <li>
                <a href="/tiket">
                    <button class="{{ request()->is('tiket') ? 'active' : '' }}">PESAN TIKET</button>
                </a>
            </li>
            <li>
                <a href="/tiket">
                    <button class="{{ request()->is('tiket') ? 'active' : '' }}">LOGIN</button>
                </a>
            </li>
        </div>
    </header>

@yield('content')

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="{{ asset('asset_user/assets/js/script.js') }}"></script>
</body>

</html>
