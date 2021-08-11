<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISAC 2021</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/soal/confirmtest.css') }}">

<!-- Font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@500;600;700&display=swap"
rel="stylesheet">
</head>
<body>
    <div class="box">
        <div class="containbox">
            <h2 class="judul">{{ $packet->name }}</h2>
            <p class="keterangan">{{ $packet->detail }}</p>
            <div class="buttons1">
                @if ($opened)
                <a href="{{ route('user.soal.take', $id) }}" class="btn-enter">Mulai
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                      </svg>
                </a>

                @else
                <p>Soal belum dibuka, mohon tunggu hingga waktunya</p>
                @endif
                <a href="{{ route('user.index') }}">Kembali</a>
            </div>
        </div>
        <div>
            <div class="smallbox">
                {{-- <h3>Detail</h3> --}}
                <p class="jumlahsoal">Jumlah</p>
                <h2 class="gradient">{{ $packet->question_count }} soal</h2>
                <p>Waktu Pengerjaan</p>
                <h2 class="gradient">{{ $packet->duration }} menit</h2>
                <p>dibuka : {{ $open }}</p>
                <p>ditutup : {{ $close }}</p>
            </div>
        </div>
        <div class="buttons2">
            @if ($opened)
                <a href="{{ route('user.soal.take', $id) }}" class="btn-enter">Mulai
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                      </svg>
                </a>

                @else
                <p>Soal belum dibuka, mohon tunggu hingga waktunya</p>
                @endif
                <a href="{{ route('user.index') }}">Kembali</a>
        </div>
    </div>
</body>
</html>
