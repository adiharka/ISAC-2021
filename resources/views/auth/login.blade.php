<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Isac</title>

    <!-- SEO -->
    <meta name="theme-color" content="#000022">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ISAC 2021" />
    <meta property="og:url" content="https://isac.himsiunair.com" />
    <meta property="og:description"
        content="Information System Airlangga Competition 2021" />
    <meta property="og:image"
        content="{{ asset('img/logo.png') }}" />

    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}" />

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register-login.css') }}">
    <style>
        body {
            height: 100vh;
        }
    </style>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <img src="{{ asset('img/landing-login-register/bg.png') }}" class="bg">

    <div class="card">
        <form class="card-body" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>User Login</h2>
            @include('template.error')
            <div class="input-container">
                <input name="email" type="text" class="input" placeholder=" " value="{{ old('email') }}">
                <div class="cut" style="width: 52px"></div>
                <label for="email" class="placeholder">Email</label>
            </div>
            <div class="input-container">
                <input name="password" type="password" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="password" class="placeholder">Password</label>
            </div>
            {{-- <p class="danger-alert caption">Invalid Username or Password</p> --}}
            {{-- <div class="grid">
                <div class="form-check">
                    <input type="radio" class="form-check-input">
                    <label for="" class="caption">Remember me</label>
                </div>
                <div class="align-right">
                    <a class="caption">Forgot password?</p>
                </div>
            </div> --}}
            <p class="caption">Belum punya akun? <a href="{{ route('register') }}" class="underline-link">Register</a></p>
            <button type="submit" class="btn-submit">Login</button>
        </div>
    </div>
</body>

</html>
