<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('dashboard_assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('dashboard_assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dashboard_assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('dashboard_assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    @stack('css')
    <!-- Template Main CSS File -->
    <link href="{{ asset('dashboard_assets/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('dashboard_assets/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block span-logo">Koetai Mahkota Soundline</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->role == '1' ? 'Admin' : 'User'}}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.talent.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.talent.index') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Talent</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.event.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.event.index') }}">
                    <i class=" ri-booklet-line"></i>
                    <span>Event</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.anggota.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.anggota.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Anggota</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.sponsor.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.sponsor.index') }}">
                    <i class="bi bi-star"></i>
                    <span>Sponsor</span>
                </a>
            </li>
            <li class="nav-heading">Produk</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.kategori.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.kategori.index') }}">
                    <i class=" ri-product-hunt-fill"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.produk.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.produk.index') }}">
                    <i class=" ri-product-hunt-fill"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.ordershop.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.ordershop.index') }}">
                    <i class=" ri-product-hunt-fill"></i>
                    <span>Orderan Produk</span>
                </a>
            </li>

            <li class="nav-heading">Tiket</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.tiket.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.tiket.index') }}">
                    <i class="ri-ticket-2-fill"></i>
                    <span>Tiket</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.order.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.order.index') }}">
                    <i class="ri-ticket-2-fill"></i>
                    <span>Orderan tiket</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.user.*') ? '' : 'collapsed' }}"
                    href="{{ route('dashboard.user.index') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->
    @include('layouts.flash-message')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>

                </ol>

            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                @yield('content')
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Koetai Mahkota SOundline</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('dashboard_assets/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/SwetAlert/index.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/php-email-form/validate.js') }}"></script>
    @stack('js')
    <!-- Template Main JS File -->
    <script src="{{ asset('dashboard_assets/assets/js/main.js') }}"></script>

</body>
</html>

