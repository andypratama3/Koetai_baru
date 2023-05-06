 {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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
    {{-- <div class="card-body">
        <h5 class="card-title">With captions</h5>

        <!-- Slides with captions -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            @foreach ($events as $event)
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
          </div>

          <div class="carousel-inner">

            <div class="carousel-item">
              <img src="{{ asset('storage/img/event/' . $event->foto) }}" alt="" srcset="" class="d-block w-100">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $event->nama }}</h5>
                <p>{{ $event->deskripsi }}</p>
              </div>

            </div>

          </div>
          @endforeach

        </div><!-- End Slides with captions -->

      </div> --}}
      @foreach ($anggotas as $anggota)
      <a class="btn btn-primary" href="www.instagram.com/{{ $anggota->instagram }}">{{ $anggota->nama }}</a>
      @endforeach
{{-- @foreach ($produks as $produk)
<div class="card">

    <img src="assets/img/card.jpg" class="" alt="...">
    <img src="{{ asset('storage/img/produk/' . $produk->foto) }}" alt="" srcset="" class="card-img-top">
    <div class="card-img-overlay">
      <h5 class="card-title">{{ $produk->nama }}</h5>
      <p class="card-text">{{ $produk->deskripsi }}</p>
    </div>


  </div>
  @endforeach --}}






    <script src="{{ asset('dashboard_assets/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/echarts/echarts.min.js') }}"></script>

    <script src="{{ asset('dashboard_assets/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/vendor/tinymce/tinymce.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('dashboard_assets/assets/js/main.js') }}"></script>
</body>
</html>


