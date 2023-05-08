<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}" />
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  <title>@yield('title')</title>
</head>

<body>
  <div class="background">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light py-0">
      <div class="container-fluid">
        <a href="#" class="navbar-brand fs-6 col-md-6 fs-4" style="font-weight: bold">
          <img src="{{ asset('assets/img/kms-vol2.png')}}" class="kms-vol2" alt="..." />
          KOETAI MAHKOTA SOUNDLINE
        </a>
        <button class="navbar-toggler my-0 border-light" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link bttn bttn-pesanTiket my-1 mx-1 py-1" aria-current="page" href="#">Pesan Tiket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bttn bttn-shop my-1 mx-1 py-1" href="#">Shop</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

   @yield('content')

  <script src="{{ asset('assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
