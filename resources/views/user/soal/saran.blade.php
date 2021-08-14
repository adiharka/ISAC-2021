<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saran</title>
    <!-- Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/soal/show-question.css') }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@300;500;600;700&display=swap"
        rel="stylesheet" />
</head>
<body>
    <div class="kontainer quiz" style="max-width: 700px !important; padding:1rem; margin : 1rem auto !important">
        <form action="{{ route('user.saran', $id) }}" method="post">
            @csrf
            <h3>Tulis Saran/Kesanmu</h3>
            <p>Semua saran kami tampung. Mau saran berbobot/remeh akan sangat bermanfaat</p>
            <p>Misal tulisannya kurang enak diliat, kekecilan ato ada yg ga kebaca. Tombolnya mudah dikenali semua apa nggak. Bisa juga kek gambarnya kegedean. Cuma nulis kesan juga gpp, impresimu waktu ngliat UI nya</p>
            <textarea style="border-radius: .5rem; padding : .5rem; margin : 1rem 0 !important; width:100%; background: rgba(36, 36, 36, 0.806) ; color:white" name="saran" id="saran"  rows="5"></textarea>
            <br>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</body>
</html>
