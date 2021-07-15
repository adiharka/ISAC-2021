<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ISAC @yield('title')</title>

    <!-- SEO -->
    <meta name="theme-color" content="#000022">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ISAC 2021" />
    <meta property="og:url" content="https://isac.himsiunair.com" />
    <meta property="og:description"
        content="Information System Airlangga Competition 2021" />
    <meta property="og:image"
        content="{{ asset('img/logo.png') }}" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav mb-3">
    <div class="container">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md ">
            <div class="container">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <img src="{{ asset('img/logoclear.png')}}" height="35px" alt="ISAC 2021 Logo"
                        class="brand-image">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color:white">☰</span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item" id="nav-dashboard">
                            <a href="{{route('user.index')}}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item" id="nav-akun">
                            <a href="{{route('user.akun.index')}}" class="nav-link">Akun</a>
                        </li>
                        <li class="nav-item" id="nav-kontak">
                            <a href="{{route('user.kontak.index')}}" class="nav-link">Kontak Panitia</a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a href="{{ route('logout') }}" class="btn btn-danger ">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: unset">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        @yield('header')
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @php
                    $isAdmin = (Auth::user()->email == 'admin@himsiunair.com') ? 1 : 0;
                    @endphp

                    @if ($isAdmin)
                    <h5>Selamat datang Admin, mohon ke dashboard admin untuk menu lengkap</h5>
                    <a href=" {{ route('dashboard')}} " class="btn btn-success">Admin Dashboard</a>
                    @else
                        @yield('content')
                    @endif
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        {{-- <footer class="footer border-top my-3">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                ISAC 2021
            </div>
            <!-- Default to the left -->
            <span>
                Jika ada kendala, hubungi kontak berikut :
                <br>
                line : siapa
            </span>
        </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('vendor/adminlte/dist/js/adminlte.min.js')}}"></script>

    @yield('script')
</body>

</html>
