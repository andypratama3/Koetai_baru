<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="{{ asset('asset_user/assets/img/logo-kms1.png') }}" rel="icon">
    <link href="{{ asset('asset_user/assets/img/logo-kms1.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('asset_user/assets/css/style.css')}}" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('asset_user/assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
</head>

<div class="blur-kuning"></div>
<img src="{{ asset('asset_user/assets/img/logo-kms4.png')}}" class="logo-kms-kuning">
<main>
    <div class="container-login">
        <div class="container-kiri">
            <img src="{{ asset('asset_user/assets/img/logo-kms1.png')}}">
        </div>
        <div class="container-kanan">
            <div class="isi-container">
                <div class="judul-login">
                    <h1>DAFTAR</h1>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="form-input">
                    <div class="input-isi">
                        <label for="name">Nama</label>
                        <input type="name" id="name" name="name" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-isi">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-isi">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="password">
                    </div>
                    <div class="input-isi">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control"  name="password_confirmation" placeholder="Password" aria-label="password">
                    </div>
                </div>

                <div class="form-btn">
                    <button type="submit" class="btn-register">Daftar</button>
                    <a type="button" class="btn-login" href="{{ route('login') }}" style="text-decoration: none;">Masuk</a>
                </div>
                </form>

            </div>
        </div>
        {{-- <img src="{{ asset('asset_user/assets/img/logo-kms4.png')}}" class="bg-logo"> --}}
    </div>
</main>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
