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

<body>
    <div class="main-background"></div>
    <main>
        <div class="container-login">
            <div class="container-kiri">
                <img src="{{ asset('asset_user/assets/img/logo-kms1.png')}}">
            </div>

            <div class="container-kanan">
                <div class="isi-container">
                    {{-- @include('layouts.flash-message') --}}
                    <div class="judul-login">
                        <h1>MASUK</h1>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-input">
                            <div class="input-isi">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" :value="old('email')" class="form-control"
                                    placeholder="Email">
                            </div>
                            @if ($errors->has('email'))
                            <div class="alert alert-primary alert-dismissible fade show text-center text-black"
                                role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @endif
                            <div class="input-isi">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    aria-label="password">
                            </div>
                            @if ($errors->has('password'))
                            <div class="alert alert-primary alert-dismissible fade show text-center text-black"
                                role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-btn">
                            <button type="submit" class="btn-login">Masuk</button>
                            <br>
                            <div class="link">
                                Anda Belum Memiliki Akun? 
                                <span class="btn-link">
                                    <a href="{{ route('register') }}">Daftar</a>
                                </span>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>