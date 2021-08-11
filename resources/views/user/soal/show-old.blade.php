<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="m-3">

    @include('template.error')
    <h4>Sisa Waktu : <span id="timer" data-countdown="{{ $time }}" data-id="{{ $id }}"></span></h4>
    @include('template.countdown')
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.addEventListener('copy', function (evt) {
            evt.preventDefault();
            alert('Copying is not allowed');
        }, false);
        countDown('timer');
    </script>

    {{-- PERTANYAAN --}}
    <h1>Soal {{ $no }}</h1>
    <h3>
        {!! $currentQuestion->question !!}
    </h3>
    <img src="{{ asset('img/packet/' . $currentQuestion->img) }}" alt="">

    {{-- JAWABAN --}}
    <form method="POST" id="form">
        @csrf
        @method('PUT')
        <div id="answer">
            @if ($currentQuestion->imgAnswer)
                <input {{ ($currentAnswer->answer=="A")? "checked" : "" }} type="radio" id="A" name="answer" value="A">
                <label for="A">A </label>
                <img src="{{ asset('img/packet/' .$currentQuestion->A) }}" width="500px" for="A"></img><br>

                <input {{ ($currentAnswer->answer=="B")? "checked" : "" }} type="radio" id="B" name="answer" value="B">
                <label for="B">B </label>
                <img src="{{ asset('img/packet/' .$currentQuestion->B) }}" width="500px" for="B"></img><br>

                <input {{ ($currentAnswer->answer=="C")? "checked" : "" }} type="radio" id="C" name="answer" value="C">
                <label for="C">C </label>
                <img src="{{ asset('img/packet/' .$currentQuestion->C) }}" width="500px" for="C"></img><br>

                <input {{ ($currentAnswer->answer=="D")? "checked" : "" }} type="radio" id="D" name="answer" value="D">
                <label for="D">D </label>
                <img src="{{ asset('img/packet/' .$currentQuestion->D) }}" width="500px" for="D"></img><br>
            @else
                <input {{ ($currentAnswer->answer=="A")? "checked" : "" }} type="radio" id="A" name="answer" value="A">
                <label for="A">A {{ $currentQuestion->A }}</label><br>
                <input {{ ($currentAnswer->answer=="B")? "checked" : "" }} type="radio" id="B" name="answer" value="B">
                <label for="B">B {{ $currentQuestion->B }}</label><br>
                <input {{ ($currentAnswer->answer=="C")? "checked" : "" }} type="radio" id="C" name="answer" value="C">
                <label for="C">C {{ $currentQuestion->C }}</label><br>
                <input {{ ($currentAnswer->answer=="D")? "checked" : "" }} type="radio" id="D" name="answer" value="D">
                <label for="D">D {{ $currentQuestion->D }}</label><br>
            @endif
        </div>
        <input {{ ($currentAnswer->unsure)? "checked" : "" }}  type="checkbox" value="1" name="unsure">
        <label for="unsure">
            Ragu-ragu
        </label>
    </form>

    <br>
    <button id="uncheck" onclick = "uncheck()">Hapus pilihan</button>
    <br><br>


    {{-- NAVIGASI --}}
    @if ($no == 1)
    @else
        <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $no-1]) }}')" type="submit">Soal Sebelumnya</button>
    @endif

    @if ($no == $currentQuestion->packet->question_count)
    <a href="{{ route('user.soal.end', $id) }}">Akhiri</a>
    @else
        <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $no+1]) }}')" type="submit">Soal Berikutnya</button>
    @endif

    <br>

    {{-- MENU LIST SOAL --}}
    <h3>Daftar Soal</h3>
    @foreach ($answers as $answer)
        <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit"
            class="btn btn-outline-primary {{ ($loop->iteration == $no)? "active" : "" }}"  >
        {{ $loop->iteration }} {{ $answer->answer }}
        @if ($answer->unsure)
        🚩
        @endif
        </button>
    @endforeach

    <script>
        function uncheck() {
            var radioButton = document.getElementById("answer").childNodes;
            for (i = 0; i < radioButton.length; i++) {
                radioButton[i].checked = false;
            }
        }
        function update(action) {
            var el = document.getElementById('form');
            el.action = action;
            el.submit();
        }
    </script>

</body>
</html>


