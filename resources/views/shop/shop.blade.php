<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link href="{{ asset('dashboard_assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body>

@foreach($produks as $produk)
<div class="container">

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/img/produk/'. $produk->foto) }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h2 class="card-title">{{ $produk->nama }}</h2>
            <h6 class="card-title">{{ $produk->harga }}</h6>
            <p class="card-text">{{ $produk->deskripsi }}</p>
            <a href="{{ route('shop.show', $produk->id) }}" class="btn btn-primary">Beli</a>
            </div>
        </div>

</div>
@endforeach

</body>
</html>
