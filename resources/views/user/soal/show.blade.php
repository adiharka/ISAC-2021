<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISAC 2021</title>

    <!-- Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/soal/show-question.css') }}">

    <style>
        dl, ol, ul {
            padding: revert;
            margin-bottom: revert !important;
        }
        #answer h4 {
            text-align: left;
        }
    </style>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@300;500;600;700&display=swap"
        rel="stylesheet" />
</head>

<body>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.addEventListener('copy', function (evt) {
            evt.preventDefault();
            alert('Copying is not allowed');
        }, false);
    </script>
    <div class="kontainer">
        <div class="grid quiz">
            <div class="left">
                <div class="modal-container">
                    <button class="title" type="button" data-toggle="modal" data-target="#myModal" style="border-width:1px">
                        <h3><img src="{{ asset('svg/soal/list.svg') }}" alt=""> Daftar Soal</h3>
                    </button>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel" data-dismiss="modal" aria-label="Close">
                                        <img src="{{ asset('svg/soal/list.svg') }}" alt=""> Daftar Soal
                                    </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body" data-dismiss="modal" aria-label="Close">
                                    <div class="question-list">
                                        @foreach ($answers as $answer)
                                        @if ($loop->iteration == $no)
                                        <button class="show" onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                            <div class="number">{{ $loop->iteration }}</div>
                                            <div class="choice">{{ $answer->answer }}</div>
                                        </button>
                                        @elseif ($answer->unsure)
                                        <button class="unsured" onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                            <div class="number">{{ $loop->iteration }}</div>
                                            <div class="choice">{{ $answer->answer }}</div>
                                        </button>
                                        {{-- @elseif ($answer->answer != '')
                                        <button class="answered" onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                            <div class="number">{{ $loop->iteration }}</div>
                                            <div class="choice">{{ $answer->answer }}</div>
                                        </button> --}}
                                        @else
                                        <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                            <div class="number">{{ $loop->iteration }}</div>
                                            <div class="choice">{{ $answer->answer }}</div>
                                        </button>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('template.countdown')
                <h3 class="time-sm">
                    <img src="{{ asset('svg/soal/time.svg') }}" alt=""> Sisa Waktu :
                    <span id="timer-1" data-countdown="{{ $time }}" data-id="{{ $id }}"></span>
                    {{-- <span id="timer" data-countdown="{{ $time }}" data-id="{{ $id }}"></span> --}}
                    <script>
                        el = 'timer-1';
                        countDown(el);
                    </script>
                </h3>
                <h2><img src="{{ asset('svg/soal/number.svg') }}" class="img-fit"> Nomor {{ $no }}</h2>
                <img src="{{ asset('img/packet/' . $currentQuestion->img) }}" onerror="hideImg()" alt="" id="question-img">
                <script>
                    function hideImg() {
                      document.getElementById("question-img")
                                        .style.display = "none";
                     }
                      </script>
                {{-- <img src="https://img.icons8.com/material-outlined/1000/ffffff/image.png" id="question-img" /> --}}
                <h3>
                    {!! $currentQuestion->question !!}
                </h3>
                <form method="POST" id="form">
                    @csrf
                    @method('PUT')
                    <div id="answer">
                        @if ($currentQuestion->imgAnswer)
                        <div>
                            <input {{ ($currentAnswer->answer=="A")? "checked" : "" }} class="checkbox-budget" type="radio" value="A" name="answer" id="A">
                            <label class="for-checkbox-budget" for="A">
                                <span data-hover="A.">A.</span>
                                <img src="{{ asset('img/packet/' .$currentQuestion->A) }}" for="A"></img><br>
                            </label>
                            {{-- <input {{ ($currentAnswer->answer=="A")? "checked" : "" }} type="radio" id="A" name="answer" value="A">
                            <label for="A">A
                            </label> --}}
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="B")? "checked" : "" }} class="checkbox-budget" type="radio" value="B" name="answer" id="B">
                            <label class="for-checkbox-budget" for="B">
                                <span data-hover="B.">B.</span>
                                <img src="{{ asset('img/packet/' .$currentQuestion->B) }}" for="B"></img><br>
                            </label>
                            {{-- <input {{ ($currentAnswer->answer=="B")? "checked" : "" }} type="radio" id="B" name="answer" value="B">
                            <label for="B">B
                                <img src="{{ asset('img/packet/' .$currentQuestion->B) }}" for="B"></img><br>
                            </label> --}}
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="C")? "checked" : "" }} class="checkbox-budget" type="radio" value="C" name="answer" id="C">
                            <label class="for-checkbox-budget" for="C">
                                <span data-hover="C.">C.</span>
                                <img src="{{ asset('img/packet/' .$currentQuestion->C) }}" for="C"></img><br>
                            </label>
                            {{-- <input {{ ($currentAnswer->answer=="C")? "checked" : "" }} type="radio" id="C" name="answer" value="C">
                            <label for="C">C
                                <img src="{{ asset('img/packet/' .$currentQuestion->C) }}" for="C"></img><br>
                            </label> --}}
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="D")? "checked" : "" }} class="checkbox-budget" type="radio" value="D" name="answer" id="D">
                            <label class="for-checkbox-budget" for="D">
                                <span data-hover="D.">D.</span>
                                <img src="{{ asset('img/packet/' .$currentQuestion->D) }}" for="D"></img><br>
                            </label>
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="E")? "checked" : "" }} class="checkbox-budget" type="radio" value="E" name="answer" id="E">
                            <label class="for-checkbox-budget" for="E">
                                <span data-hover="E.">E.</span>
                                <img src="{{ asset('img/packet/' .$currentQuestion->E) }}" for="E"></img><br>
                            </label>
                        </div>
                        @else
                        <div>
                            <input {{ ($currentAnswer->answer=="A")? "checked" : "" }} class="checkbox-budget" type="radio" value="A" name="answer" id="A">
                            <label class="for-checkbox-budget" for="A">
                                <span data-hover="A.">A.</span>
                                <h4>{{ $currentQuestion->A }}</h4>
                            </label>

                            {{-- <input {{ ($currentAnswer->answer=="A")? "checked" : "" }} type="radio" id="A" name="answer" value="A">
                            <label for="A">
                                <h4>A {{ $currentQuestion->A }}</h4>
                            </label><br> --}}
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="B")? "checked" : "" }} class="checkbox-budget" type="radio" value="B" name="answer" id="B">
                            <label class="for-checkbox-budget" for="B">
                                <span data-hover="B.">B.</span>
                                <h4>{{ $currentQuestion->B }}</h4>
                            </label>
                            {{-- <input {{ ($currentAnswer->answer=="B")? "checked" : "" }} type="radio" id="B" name="answer" value="B">
                            <label for="B">
                                <h4>B {{ $currentQuestion->B }}</h4>
                            </label><br> --}}
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="C")? "checked" : "" }} class="checkbox-budget" type="radio" value="C" name="answer" id="C">
                            <label class="for-checkbox-budget" for="C">
                                <span data-hover="C.">C.</span>
                                <h4>{{ $currentQuestion->C }}</h4>
                            </label>
                            {{-- <input {{ ($currentAnswer->answer=="C")? "checked" : "" }} type="radio" id="C" name="answer" value="C">
                            <label for="C">
                                <h4>C {{ $currentQuestion->C }}</h4>
                            </label><br> --}}
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="D")? "checked" : "" }} class="checkbox-budget" type="radio" value="D" name="answer" id="D">
                            <label class="for-checkbox-budget" for="D">
                                <span data-hover="D.">D.</span>
                                <h4>{{ $currentQuestion->D }}</h4>
                            </label>
                        </div>
                        <div>
                            <input {{ ($currentAnswer->answer=="E")? "checked" : "" }} class="checkbox-budget" type="radio" value="E" name="answer" id="E">
                            <label class="for-checkbox-budget" for="E">
                                <span data-hover="E.">E.</span>
                                <h4>{{ $currentQuestion->E }}</h4>
                            </label>
                        </div>
                        @endif

                    </div>
                    <div class="options">
                        <input {{ ($currentAnswer->unsure)? "checked" : "" }} type="checkbox" value="1" name="unsure" id="unsure">
                        <label for="unsure" class="unsure {{ ($currentAnswer->unsure)? "toggle-unsure" : "" }}">
                            <img src="{{ asset('svg/soal/flag.svg') }}" alt=""><span> Saya ragu</span>
                        </label>
                        <button class="bubble" id="uncheck">
                            <img src="{{ asset('svg/soal/reset.svg') }}" alt=""><span> Hapus pilihan</span>
                        </button>
                    </div>
                    <br>
                    <div class="options end">
                        @if ($no == 1)
                        @else
                            <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $no-1]) }}')" class="prev" type="submit"><img src="{{ asset('svg/soal/left.svg') }}" alt=""> Sebelum</button>
                        @endif

                        @if ($no == $currentQuestion->packet->question_count)
                        {{-- <a href="{{ route('user.soal.end', $id) }}">Akhiri</a> --}}
                        <button class="done" data-toggle="end-modal" data-target="#endModal"><img src="{{ asset('svg/soal/done.svg') }}"
                            alt=""> Akhiri</button>
                        @else
                            <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $no+1]) }}')" class="next" type="submit">Lanjut <img src="{{ asset('svg/soal/right.svg') }}" alt=""></button>
                        @endif

                    </div>
                    <div class="modal fade end-modal" id="endModal" tabindex="-1" role="dialog"
                        aria-labelledby="endModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="margin:1rem !important">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin mengakhiri?</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Jika diakhiri maka kamu tidak bisa lagi mengedit jawaban yang telah kamu isi.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        <img src="{{ asset('svg/soal/back.svg') }}" alt=""> Batal
                                    </button>
                                    <a href="{{ route('user.soal.end', $id) }}" class="btn btn-primary"><img src="{{ asset('svg/soal/done.svg') }}" alt="">
                                        Akhiri</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="right">
                <div>
                    <h3>
                        <img src="{{ asset('svg/soal/time.svg') }}" alt=""> Sisa Waktu :
                        <span id="timer-2" data-countdown="{{ $time }}" data-id="{{ $id }}"></span>
                        <script>
                            el = 'timer-2';
                            countDown(el);
                        </script>
                    </h3>
                    <img src="{{ asset('img/packet/' . $currentQuestion->img) }}" alt="" id="question-img">
                    <div class="question-list">
                        <h3><img src="{{ asset('svg/soal/list.svg') }}" alt=""> Daftar Soal</h3>
                        @foreach ($answers as $answer)
                            @if ($loop->iteration == $no)
                            <button class="show" onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                <div class="number">{{ $loop->iteration }}</div>
                                <div class="choice">{{ $answer->answer }}</div>
                            </button>
                            @elseif ($answer->unsure)
                            <button class="unsured" onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                <div class="number">{{ $loop->iteration }}</div>
                                <div class="choice">{{ $answer->answer }}</div>
                            </button>
                            {{-- @elseif ($answer->answer != '')
                            <button class="answered" onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                <div class="number">{{ $loop->iteration }}</div>
                                <div class="choice">{{ $answer->answer }}</div>
                            </button> --}}
                            @else
                            <button onclick="update('{{ route('user.soal.update', [$id, $currentAnswer->id, $loop->iteration]) }}')" type="submit">
                                <div class="number">{{ $loop->iteration }}</div>
                                <div class="choice">{{ $answer->answer }}</div>
                            </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="cp">
            <p>If you find any problems, contact us : <br><br>
                <strong>Sulthan</strong><br>
                Whatsapp : +628119381391 <br>
                Line : sultanfbtr245<br><br>
                <strong>Oxy</strong><br>
                Whatsapp : +6285335995105 <br>
                Line : Oxysh_<br>
            </p>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script>
        // HAPUS PILIHAN
        const bubble = document.getElementsByClassName('bubble')[0];
        function handleClick(e) {
            e.preventDefault();
            e.target.classList.remove('animate');

            e.target.classList.add('animate');
            setTimeout(() => {
                e.target.classList.remove('animate');
            }, 700);

            var radioButton = document.querySelectorAll('#answer input');
            for (i = 0; i < radioButton.length; i++) {
                radioButton[i].checked = false;
            }
        }
        function handleChild(e) {
            e.target.parentElement.classList.remove('animate');
            e.target.parentElement.classList.add('animate');
            setTimeout(() => {
                e.target.parentElement.classList.remove('animate');
            }, 700);

            var radioButton = document.querySelectorAll('#answer input');
            for (i = 0; i < radioButton.length; i++) {
                radioButton[i].checked = false;
            }
        }

        bubble.addEventListener('click', handleClick, false);
        $('.bubble span').click(handleChild)
        $('.bubble img').click(handleChild)


        // RAGU-RAGU
        $('.unsure').click(e => {
            e.preventDefault();
            document.querySelector('.unsure').classList.toggle('toggle-unsure');
            if (document.querySelector('input[name="unsure"]').checked) {
                document.querySelector('input[name="unsure"]').checked = false;
            }
            else {
                document.querySelector('input[name="unsure"]').checked = true;
            }
        });

        // MODAL SEBELUM AKHIRI
        $('.done').click(e => {
            e.preventDefault();
            $('#endModal').modal();
        });

        function update(action) {
            var el = document.getElementById('form');
            el.action = action;
            el.submit();
        }
    </script>

</body>

</html>
