<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="card m-3 p-3">
        <h1>{{ $packet->name }}</h1>
        <p>{{ $packet->detail }}</p>
        <ul>
            <li>Jumlah Soal : {{ $packet->question_count }}</li>
            <li>Dibuka : {{ $open }}</li>
            <li>Ditutup : {{ $close }}</li>
            <li>Waktu Pengerjaan : {{ $packet->duration }} menit</li>
          </ul>
        <br>
        <a href="{{ route('user.index') }}" class="btn">Kembali</a>
        @if ($opened)

        <a href="{{ route('user.soal.take', $id) }}" class="btn btn-primary">GASS</a>
        @else
        <p>Masih belum buka bous</p>
        <a href="{{ route('user.soal.take', $id) }}" class="btn btn-primary disabled" aria-disabled="true">GASS</a>

        @endif
    </div>
</body>
</html>
