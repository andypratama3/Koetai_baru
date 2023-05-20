<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{!!asset('Asset2/assets/img/favicon.png')!!}" rel="icon">
    <link href="{!!asset('Asset2/assets/img/apple-touch-icon.png')!!}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('assetsslide/bootstrap.min.css')!!}">
    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card shadow produk_data">
        <div class="card-body">
            <div class="row">
                @include('layouts.flash-message')
                <div class="col-md-4 border-right">
                    <img src="{{ asset('storage/img/produk/'.$produk->foto) }}" class="w-100" alt="">
                </div>

                <div class="col-md-8">
                    <br>
                    <h2 class="mb-0">
                        {{$produk->nama}}
                    </h2>
                    <hr>
                    <label class="me-3">Harga Rp. <b>{{$produk->harga}}</b></label>
                    <i class="bi bi-arrow-right"></i>

                    <hr>
                    @if($produk->stock > 0)
                    <label class="badge bg-success">In Stock : {{$produk->stok}} Item</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{$produk->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity " value="1"
                                    class="form-control qty-input text-center">
                                <button class="input-group-text incerement-btn" style="size: 5px;">+</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            @if ($produk->stock > 0)
                            <form action="{{ route('shop.store'. $produk->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
                            <button type="submit" class="btn btn-primary  me-3 float-start">Beli Sekarang
                                <i class="bi bi-cart"></i></button>
                            </form>
                            @endif
                            {{-- <form action="{{ route('cart.store'. $produk->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}"> --}}
                                <button type="submit" class="btn btn-success addcart me-3 float-start">Add To
                                Cart <i class="bi bi-heart"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h4>Deskripsi</h4>
                    <p class="mt-3">
                        {!! $produk->deskripsi !!}
                    </p>
                    <br>
                    <br>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $('.addcart').click(function (e){
            e.preventDefault();

            var produk_id = $(this).closest('.produk_data').find('.produk_id').val();


            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'produk_id': produk_id,

                },
                success: function (response){
                    Swal.fire(
                    'Success',
                    response.status,
                    'success',
                    )
                    loadcart();
                },

            });
    });
        </script>
</body>
</html>


