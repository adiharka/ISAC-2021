<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
            /* height: 100vh; */
            overflow-y: scroll !important;
        }

        .card {
            margin: 100px;
            /* max-height: 80vh; */
        }

    </style>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
        <script>
            function olim() {
                document.getElementById('judul').style.display = 'none';
                document.getElementById('anggota').style.visibility = 'unset';
                document.getElementById('anggota_input').disabled = false;
                document.getElementById('maks_orang').innerHTML = '(maks 3 orang)';
            }
            function poster() {
                document.getElementById('judul').style.display = 'none';
                document.getElementById('anggota').style.visibility = 'hidden';
                document.getElementById('anggota_input').disabled = true;
                document.getElementById('maks_orang').innerHTML = '(maks 2 orang)';
            }
        </script>
</head>

<body>
    <img src="{{ asset('img/landing-login-register/bg.png') }}" class="bg">

    <div class="card card-reg">
        <form method="POST" action="{{ route('register') }}" class="card-body">
            @csrf
            <h2>Daftar Sekarang</h2>
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error :
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif
            <!-- Opsi lomba -->
            <h4>Lomba yang Diikuti
                <small id="judul">(pilih salah satu)</small>
            </h4>
            <div class="option">
                <input class="checkbox-budget" onchange="olim()" type="radio" value="olim" name="lomba" id="budget-1">
                <label class="for-checkbox-budget" for="budget-1">
                    <span data-hover="Olimpiade">Olimpiade</span>
                </label>
                <input class="checkbox-budget" onchange="poster()" type="radio" value="poster" name="lomba" id="budget-2">
                <label class="for-checkbox-budget" for="budget-2">
                    <span data-hover="Poster">Poster</span>
                </label>

            </div>
            <!-- Info Tim -->
            <h4>Info Tim</h4>
            <div class="input-container">
                <input name="teamname" type="text" class="input" placeholder=" " value="{{ old('teamname') }}">
                <div class="cut"></div>
                <label for="teamname" class="placeholder">Nama Tim</label>
            </div>
            <div class="input-container">
                <input name="school" type="text" class="input" placeholder=" " value="{{ old('school') }}">
                <div class="cut medium"></div>
                <label for="school" class="placeholder">Asal Sekolah</label>
            </div>
            <div class="input-container">
                <select name="school_province" class="input" id="school_province">
                    <option value="" selected disabled>
                        Provinsi Sekolah
                    </option>
                    <option value="ACEH">
                        ACEH
                    </option>
                    <option value="SUMATERA UTARA">
                        SUMATERA UTARA
                    </option>
                    <option value="SUMATERA BARAT">
                        SUMATERA BARAT
                    </option>
                    <option value="RIAU">
                        RIAU
                    </option>
                    <option value="JAMBI">
                        JAMBI
                    </option>
                    <option value="SUMATERA SELATAN">
                        SUMATERA SELATAN
                    </option>
                    <option value="BENGKULU">
                        BENGKULU
                    </option>
                    <option value="LAMPUNG">
                        LAMPUNG
                    </option>
                    <option value="KEPULAUAN BANGKA BELITUNG">
                        KEPULAUAN BANGKA BELITUNG
                    </option>
                    <option value="KEPULAUAN RIAU">
                        KEPULAUAN RIAU
                    </option>
                    <option value="DKI JAKARTA">
                        DKI JAKARTA
                    </option>
                    <option value="JAWA BARAT">
                        JAWA BARAT
                    </option>
                    <option value="JAWA TENGAH">
                        JAWA TENGAH
                    </option>
                    <option value="DI YOGYAKARTA">
                        DI YOGYAKARTA
                    </option>
                    <option value="JAWA TIMUR">
                        JAWA TIMUR
                    </option>
                    <option value="BANTEN">
                        BANTEN
                    </option>
                    <option value="BALI">
                        BALI
                    </option>
                    <option value="NUSA TENGGARA BARAT">
                        NUSA TENGGARA BARAT
                    </option>
                    <option value="NUSA TENGGARA TIMUR">
                        NUSA TENGGARA TIMUR
                    </option>
                    <option value="KALIMANTAN BARAT">
                        KALIMANTAN BARAT
                    </option>
                    <option value="KALIMANTAN TENGAH">
                        KALIMANTAN TENGAH
                    </option>
                    <option value="KALIMANTAN SELATAN">
                        KALIMANTAN SELATAN
                    </option>
                    <option value="KALIMANTAN TIMUR">
                        KALIMANTAN TIMUR
                    </option>
                    <option value="KALIMANTAN UTARA">
                        KALIMANTAN UTARA
                    </option>
                    <option value="SULAWESI TENGAH">
                        SULAWESI TENGAH
                    </option>
                    <option value="SULAWESI UTARA">
                        SULAWESI UTARA
                    </option>
                    <option value="SULAWESI SELATAN">
                        SULAWESI SELATAN
                    </option>
                    <option value="SULAWESI TENGGARA">
                        SULAWESI TENGGARA
                    </option>
                    <option value="GORONTALO">
                        GORONTALO
                    </option>
                    <option value="SULAWESI BARAT">
                        SULAWESI BARAT
                    </option>
                    <option value="MALUKU">
                        MALUKU
                    </option>
                    <option value="MALUKU UTARA">
                        MALUKU UTARA
                    </option>
                    <option value="PAPUA">
                        PAPUA
                    </option>
                    <option value="PAPUA BARAT">
                        PAPUA BARAT
                    </option>
                </select>
                <div class="cut long"></div>
                <label for="school_province" class="placeholder">Provinsi Sekolah</label>
            </div>
            <div class="input-container">
                <input name="school_city" type="text" class="input" placeholder=" " value="{{ old('school_city') }}">
                <div class="cut medium"></div>
                <label for="school_city" class="placeholder">Kota Sekolah</label>
            </div>
            <div class="input-container">
                <input name="email" type="text" class="input" placeholder=" " value="{{ old('email') }}">
                <div class="cut"></div>
                <label for="email" class="placeholder">Email Tim</label>
            </div>
            <div class="input-container">
                <input name="password" type="password" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="password" class="placeholder">Password</label>
            </div>
            <div class="input-container">
                <input name="password_confirmation" type="password" class="input" placeholder=" ">
                <div class="cut verylong"></div>
                <label for="password_confirmation" class="placeholder">Konfirmasi password</label>
            </div>
            {{-- <p class="danger-alert caption">Password does not match</p> --}}
            <!-- Info Peserta -->
            <h4>Info Peserta <small id="maks_orang">(maks 3 orang)</small></h4>
            <div class="input-container">
                <input name="name" type="text" class="input" placeholder=" " value="{{ old('name') }}">
                <div class="cut longest"></div>
                <label for="name" class="placeholder">Nama Anggota 1 (Ketua)</label>
            </div>
            <div class="input-container">
                <input name="whatsapp" type="text" class="input" placeholder=" " value="{{ old('whatsapp') }}">
                <div class="cut longest"></div>
                <label for="whatsapp" class="placeholder">Kontak Whatsapp Aktif</label>
            </div>
            <div class="input-container">
                <input name="name2" type="text" class="input" placeholder=" " value="{{ old('name2') }}">
                <div class="cut long"></div>
                <label for="name2" class="placeholder">Nama Anggota 2</label>
            </div>
            <div id="anggota"  class="input-container">
                <input id="anggota_input" name="name3" type="text" class="input" placeholder=" " value="{{ old('name3') }}">
                <div class="cut long"></div>
                <label for="name3" class="placeholder">Nama Anggota 3</label>
            </div>
            {{-- <div class="option">
                <button class="btn-lavender">Hapus</button>
                <button class="btn-lavender">Tambah</button>
            </div> --}}

            {{-- <p class="danger-alert caption">Please fill all form</p> --}}
            <div class="signin-submit">
                <p class="caption">Sudah punya akun? <a href="{{ route('login') }}" class="underline-link">Sign
                        in</a></p>
                <button type="submit" class="btn-lavender">Daftar</button>
            </div>
        </form>
    </div>
</body>

</html>
