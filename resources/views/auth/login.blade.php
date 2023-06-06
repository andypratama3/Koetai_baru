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

<main>

    <body>
        <div class="blur-kuning"></div>
        <a href="/" class="link-keluar-login">
            <div class="btn-keluar-login">
                <i class='bx bxs-chevron-left logo-keluar-login'></i>
            </div>
        </a>

        <div class="container-login">
            <div class="container-kiri">
                <img src="{{ asset('asset_user/assets/img/logo-kms1.png')}}">
            </div>
            <div class="container-kanan">
                <div class="isi-container">
                    <div class="judul-login">
                        <h1>MASUK</h1>
                    </div>
                    <div class="form-input">
                        <div class="input-isi">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-isi">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" aria-label="password">
                        </div>
                        <div class="input-isi">
                            <label for="co-password">Konfirmasi Password</label>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password"
                                aria-label="co-password">
                        </div>
                    </div>
                    <div class="form-btn">
                        <button type="submit" class="btn-login">Masuk</button>
                        <button type="submit" class="btn-register">Register</button>
                    </div>
                </div>
            </div>
            <img src="{{ asset('asset_user/assets/img/logo-kms4.png')}}" class="bg-logo">
        </div>

</main>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>


{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus
            autocomplete="username" />
    </div>

    <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <x-checkbox id="remember_me" name="remember" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif

        <a class="ml-4" style="backround-color: black" href="{{ route('register') }}">
            {{ __('Register') }}
        </a>
        <x-button class="ml-4">
            {{ __('Log in') }}
        </x-button>

    </div>
</form>
</x-authentication-card>
</x-guest-layout> --}}