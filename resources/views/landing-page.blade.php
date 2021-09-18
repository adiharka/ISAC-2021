<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ISAC 2021</title>

    <!-- SEO -->
    <meta name="theme-color" content="#000022">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ISAC 2021" />
    <meta property="og:url" content="https://isac.himsiunair.com" />
    <meta property="og:description" content="Information System Airlangga Competition 2021" />
    <meta property="og:image" content="{{ asset('img/logo.png') }}" />

    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}" />

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/env.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/landing-page-bawah.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@300;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function showOnScroll($id) {
            let el = document.getElementById($id);
            $(window).scroll(function () {
                if ($(this).scrollTop() > 500) {
                    el.style.opacity = 1;
                } else {
                    el.style.opacity = 0;
                }
            });
        }
        function credit() {
            let id = document.getElementById('credit');
            id.innerHTML = "Created by Andi Mahardika, Rafid Nagara, Oxy Septya, Daffa Permadi, Nyoman Arya, Annisa Putri"
        }
    </script>
</head>

<body>
    <!-- Nav -->
    <nav class="nav">
        <a href="#landing">
            <img id="logo-clear" src="{{ asset('img/landing-login-register/isac-clear.png') }}"
                onload="showOnScroll('logo-clear')" alt="ISAC 2021" style="opacity: 0" />
        </a>
        <div class="nav-link-group">
            <a href="#competition" class="nav-link">Competition</a>
            <a href="#timeline" class="nav-link">Timeline</a>
            <a href="#contact-us" class="nav-link">Contact Us</a>
        </div>
        @auth
        @if (Auth::user()->role == 'admin')
        <a href="{{ route('dashboard') }}"><button class="btn-login">Dashboard</button></a>
        @else
        <a href="{{ route('user.index') }}"><button class="btn-login">Dashboard</button></a>
        @endif
        @else
        <a href="{{ route('login') }}"><button class="btn-login">Login</button></a>
        @endauth
    </nav>
    <!-- Nav end -->

    <!-- welcome page -->
    <div id="landing" class="landing">
        <div class="box">
            {{-- <img src="{{ asset('img/landing-login-register/isac-lg.png') }}" alt=""> --}}
            <picture>
                <source srcset="{{ asset('img/landing-login-register/isac-xl.png') }}" media="(min-width: 2050px)" />
                <source srcset="{{ asset('img/landing-login-register/isac-lg.png') }}" media="(min-width: 800px)" />
                <source srcset="{{ asset('img/landing-login-register/isac-md.png') }}" media="(min-width: 550px)" />
                <img src="{{ asset('img/landing-login-register/isac-sm.png') }}" alt="Baby Sleeping" />
            </picture>
            @if (Auth::check())
            {{-- <a href="{{ route('login') }}"><button class="btn-lavender">Dash</button></a> --}}
            @else
            <a href="{{ route('register') }}"><button class="btn-lavender">REGISTER NOW!</button></a>
            @endif
        </div>
    </div>
    <!-- welcome page end -->

    <!-- Deskripsi ISAC -->
    <div class="star">
        {{-- <img src="{{ asset('img/landing-login-register/star.png') }}" alt=""> --}}
        <picture>
            <source srcset="{{ asset('img/landing-login-register/star.png') }}" media="(min-width: 800px)" />
            <img src="{{ asset('img/landing-login-register/star-sm.png') }}" alt="Baby Sleeping" />
        </picture>
    </div>
    <div class="desc-container" style="max-width: 1400px; margin: auto">
        <h2 class="gradient">What is ISAC?</h2>
        <p>ISAC merupakan kompetisi tahunan yang diselenggarakan oleh HIMSI UNAIR. Tahun ini ISAC datang dengan dua
            jenis kompetisi yaitu OLYMPIAD dan CREATIVE POSTER.<br>
            <span class="yellow-txt">ISAC Olympiad</span> akan menguji kemampuan logika, pemrograman dasar, serta ilmu
            sistem informasi dasar kamu.
            Sedangkan <span class="purple-txt">ISAC Creative Poster</span> akan menguji kemampuan peserta dalam
            menyelesaikan masalah dan mewujudkannya
            dalam bentuk poster</p>
    </div>
    <!-- Deskripsi ISAC end -->

    <!-- Value ISAC -->
    <div class="val-overflow">
        <div class="value">
            <div class="val-name">
                <h4>A<span class="purple-txt">·</span>dapt<span class="yellow-txt">·</span>ive</h4>
                <img src="{{ asset('img/landing-login-register/val-adaptive.png') }}" alt="">
                <p>Ability to change in order to suit different conditions</p>
            </div>
            <div class="val-name">
                <h4>Con<span class="purple-txt">·</span>nec<span class="yellow-txt">·</span>tive</h4>
                <img src="{{ asset('img/landing-login-register/val-connective.png') }}" alt="">
                <p>Breaking the wall of separation and assemble a wide range of individuals</p>
            </div>
            <div class="val-name">
                <h4>Pi<span class="purple-txt">·</span>o<span class="yellow-txt">·</span>neer</h4>
                <img src="{{ asset('img/landing-login-register/val-pioneer.png') }}" alt="">
                <p>To be the one who willing to innovate</p>
            </div>
            <div class="val-name">
                <h4>In<span class="purple-txt">·</span>no<span class="yellow-txt">·</span>va<span
                        class="purple-txt">·</span>tive</h4>
                <img src="{{ asset('img/landing-login-register/val-innovative.png') }}" alt="">
                <p>Initiate an unexplored solution to help solving a problem</p>
            </div>
            <div class="val-name">
                <h4>Ben<span class="purple-txt">·</span>e<span class="yellow-txt">·</span>fi<span
                        class="purple-txt">·</span>cial</h4>
                <img src="{{ asset('img/landing-login-register/val-benefical.png') }}" alt="">
                <p>Bestow a good ouput upon society</p>
            </div>
        </div>
    </div>
    <!-- Value ISAC end -->

    <!-- Competition -->
    <div class="competition-lg" id="competition">
        <h2 class="gradient" style="max-width: 1400px; margin: auto">COMPETITION</h2>
        <div class="all top"
            style="background-size: 100% 100%; background: url('{{ asset('img/landing-login-register/comp-lg-1.svg')}}') no-repeat center center;">
            <div class="slideshow-container">
                <div class="slide-top fade ">
                    <div class="content-1">
                        {{-- <div class="download-box soal">
                        </div> --}}
                        <div class="download-box guide">
                            <h4>GUIDE BOOK</h4>
                            <img src="{{ asset('img/landing-login-register/file.png') }}" alt="">
                            <a href="http://bit.ly/PosterISAC2021" target="_blank"><button class="btn-submit focus">Download</button></a>
                        </div>
                        <div class="desc-box">
                            <h3>Creative Poster</h3>
                            <p>Kompetisi yang menguji kreativitas peserta dalam menghadirkan
                                sebuah informasi dalam bentuk poster. Bertujuan untuk mengasah kemampuan
                                peserta dalam menyelesaikan sebuah masalah dan mempresentasikannya dalam wujud poster.
                                Masalah akan diberikan melalui study case dengan tema besar Pursuing Innovation:
                                Digital Transformation for Society 5.0</p>
                            <div class="desc-label">
                                <p>online</p>
                                <p>nasional</p>
                                <p>SMA sederajat</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-top fade">
                    <div class="timeline-1">
                        <h3>Timeline Creative Poster</h3>
                        <img src="{{ asset('img/landing-login-register/timeline-1.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="page-box">
                <span class="page-top" onclick="currentSlide(1)"></span>
                <span class="page-top" onclick="currentSlide(2)"></span>
            </div>
        </div>
        <div class="all bottom"
            style="background: url('{{ asset('img/landing-login-register/comp-lg-2.svg') }}') no-repeat center center;">
            <div class="slideshow-container">
                <div class="slide-bottom fade ">
                    <div class="content-2">
                        <div class="desc-box">
                            <h3>ISAC Olympiad</h3>
                            <p>Kompetisi yang menguji kemampuan logika, pemrograman dasar, dan ilmu
                                sistem informasi dasar untuk menyelesaikan masalah yang ada. Bertujuan
                                untuk mengasah kemampuan logika dan pemrograman peserta serta memperkenalkan ilmu sistem
                                informasi dasar tepatnya dalam ranah jaringan, bisnis, dan sistem </p>
                            <div class="desc-label">
                                <p>online</p>
                                <p>nasional</p>
                                <p>SMA sederajat</p>
                            </div>
                        </div>
                        <div class="download-box guide">
                            <h4>GUIDE BOOK</h4>
                            <img src="{{ asset('img/landing-login-register/file.png') }}" alt="">
                            <a href="http://bit.ly/OlympiadISAC2021" target="_blank"><button class="btn-submit focus">Download</button></a>
                        </div>
                        {{-- <div class="download-box soal">
                            <h4>LATIHAN SOAL</h4>
                            <img src="{{ asset('img/landing-login-register/file.png') }}" alt="">
                            <button class="btn-disabled">Soon</button>
                        </div> --}}
                    </div>
                </div>
                <div class="slide-bottom fade">
                    <div class="timeline-2">
                        <h3>Timeline Olympiad</h3>
                        <img src="{{ asset('img/landing-login-register/timeline-2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="page-box">
                <span class="page-bottom" onclick="currentSlidee(1)"></span>
                <span class="page-bottom" onclick="currentSlidee(2)"></span>
            </div>
        </div>
    </div>
    <!-- ------------------------------------- -->
    <div class="competition-sm">
        <h2 class="gradient">COMPETITION</h2>
        <div class="all-sm top"
            style="background: url('{{ asset('img/landing-login-register/comp-sm-11.svg')}}') no-repeat center center;">
            <div class="slideshow-container">
                <div class="slide-sm-top fade">
                    <div class="content-1">
                        <div class="desc-box">
                            <h3>Creative Poster</h3>
                            <p>Kompetisi yang menguji kreativitas peserta dalam menghadirkan
                                sebuah informasi dalam bentuk poster. Bertujuan untuk mengasah kemampuan
                                peserta dalam menyelesaikan sebuah masalah dan mempresentasikannya dalam wujud poster.
                                Masalah akan diberikan melalui study case dengan tema besar Pursuing Innovation:
                                Digital Transformation for Society 5.0</p>
                            <div class="desc-label">
                                <p>online</p>
                                <p>nasional</p>
                                <p>SMA sederajat</p>
                            </div>
                        </div>
                        <div class="downloads">
                            <div class="download-box guide">
                                <h4>GUIDE BOOK</h4>
                                <a href="http://bit.ly/PosterISAC2021" target="_blank"><button class="btn-submit focus">Download</button></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="slide-sm-top fade">
                    <div class="timeline-sm-1">
                        <h3>Timeline Creative Poster</h3>
                        <img src="{{ asset('img/landing-login-register/timeline-sm-1.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="page-box">
                <span class="page-sm-top" onclick="currentSlideSm(1)"></span>
                <span class="page-sm-top" onclick="currentSlideSm(2)"></span>
            </div>
        </div>

        <div class="all-sm bottom"
            style="background: url('{{ asset('img/landing-login-register/comp-sm-21.svg')}}') no-repeat center center;">
            <div class="slideshow-container">
                <div class="slide-sm-bottom fade">
                    <div class="content-2">
                        <div class="desc-box">
                            <h3>Olympiad</h3>
                            <p>Kompetisi yang menguji kemampuan logika, pemrograman dasar, dan ilmu
                                sistem informasi dasar untuk menyelesaikan masalah yang ada. Bertujuan
                                untuk mengasah kemampuan logika dan pemrograman peserta serta memperkenalkan ilmu sistem
                                informasi dasar tepatnya dalam ranah jaringan, bisnis, dan sistem</p>
                            <div class="desc-label">
                                <p>online</p>
                                <p>nasional</p>
                                <p>SMA sederajat</p>
                            </div>
                        </div>
                        <div class="downloads">
                            <div class="download-box guide">
                                <h4>GUIDE BOOK</h4>
                                <a href="http://bit.ly/OlympiadISAC2021" target="_blank"><button class="btn-submit focus">Download</button></a>
                            </div>
                            {{-- <div class="download-box soal">
                                <h4>LATIHAN SOAL</h4>
                                <button class="btn-disabled">Soon</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="slide-sm-bottom fade">
                    <div class="timeline-sm-2">
                        <h3>Timeline Olympiad</h3>
                        <img src="{{ asset('img/landing-login-register/timeline-sm-2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="page-box">
                <span class="page-sm-bottom" onclick="currentSlideeSm(1)"></span>
                <span class="page-sm-bottom" onclick="currentSlideeSm(2)"></span>
            </div>
        </div>
    </div>
    <!-- Competition end -->

    <!-- FAQ -->
    <div class="FAQ" style="max-width: 1400px; margin: auto; padding: 0 1rem">
        <div class="FAQtitle">
            <h2 class="gradient">FREQUENTLY ASKED QUESTION</h2>
        </div>

        <div class="faq-box">
            <div></div>
            <div class="right-que">
                <h3>Gimana caranya daftar??</h3>
            </div>
            <div class="left-que">
                <h3>Apakah boleh mengikuti lomba secara individu?</h3>
            </div>
            <div class="content-right">
                <p>Tekan tombol register now lalu isi form yang ada. Setelah itu login untuk melengkapi data yang tersedia dan membayar biaya pendaftaran</p>
            </div>
            <div class="content-left">
                <p>Baik lomba olimpiade ataupun poster boleh diikuti secara individual</p>
            </div>
            <div></div>
        </div>

        <div class="faq-box">
            <div></div>
            <div class="right-que">
                <h3>Sudah mendaftar tapi akun belum diverifikasi</h3>
            </div>
            <div class="left-que">
                <h3>Apakah ada acara lain selain perlombaan</h3>
            </div>
            <div class="content-right">
                <p>Pastikan data yang dibutuhkan tiap peserta sudah dilengkapi dan sudah membayar biaya pendaftaran. Jika sudah maka tunggu antrian pemeriksaan oleh panitia</p>
            </div>
            <div class="content-left">
                <p>Tentu saja ada, pantau terus infonya di instagaram official kami</p>
            </div>
            <div></div>
        </div>

        <div class="faq-box">
            <div></div>
            <div class="right-que">
                <h3>Peserta tidak lolos final tetap dapat sertifikat?</h3>
            </div>
            <div class="left-que">
                <h3>Untuk link grup telegram didapat dari mana?</h3>
            </div>
            <div class="content-right">
                <p>Tentu saja tetap mendapatkan sertifikat dan bisa kamu lampirkan untuk pendaftaran SNMPTN ataupun jalur lainnya</p>
            </div>
            <div class="content-left">
                <p>Jika akun kamu sudah terverifikasi oleh panitia maka kamu akan dikontak melalui email yang berisi link tersebut</p>
            </div>
            <div></div>
        </div>
    </div>
    {{-- <div class="showbox">
        <a href="">Show More</a>
    </div> --}}
    {{-- </div> --}}
    <!-- FAQ End -->


    <!-- Timeline -->
    <div id="timeline" class="divider square" style="padding-top: 3rem">
        <div class="timeline">
            {{-- <img src="{{ asset('img/landing-login-register/squaree.png') }}"> --}}
            <picture>
                <source srcset="{{ asset('img/landing-login-register/squaree.png') }}" media="(min-width: 790px)" />
                <img src="{{ asset('img/landing-login-register/squaree-sm.png') }}" alt="Baby Sleeping" />
            </picture>
            <h2 class="gradient">TIMELINE</h2>
        </div>
    </div>

    <div class="tl-line-container">
        <div class="tl-line right">
            <div>
            </div>
            <div class="content">
                <img src="{{ asset('img/landing-login-register/square1.png') }}">
            </div>
            <div class="tl-desc right">
                <h3>Pendaftaran Gelombang 1</h3>
                <p>19 Juli - 1 Agustus 2021</p>
            </div>
        </div>
        <div class="tl-line left">
            <div class="tl-desc left">
                <h3>Pendaftaran Gelombang 2</h3>
                <p>4 - 29 Agustus 2021</p>
            </div>
            <div class="content">
                <img src="{{ asset('img/landing-login-register/square2.png') }}">
            </div>
            <div>
            </div>
        </div>
        <div class="tl-line right">
            <div>
            </div>
            <div class="content">
                <img src="{{ asset('img/landing-login-register/square3.png') }}">
            </div>
            <div class="tl-desc right">
                <h3>Babak Penyisihan <span class="yellow-txt">(Olympiad)</span></h3>
                <p>19 September 2021</p>
            </div>
        </div>
        <div class="tl-line left">
            <div class="tl-desc left">
                <h3>Babak Semifinal <span class="yellow-txt">(Olympiad)</span></h3>
                <p>3 Oktober 2021</p>
            </div>
            <div class="content">
                <img src="{{ asset('img/landing-login-register/square4.png') }}">
            </div>
            <div>
            </div>
        </div>
        <div class="tl-line right">
            <div>
            </div>
            <div class="content">
                <img src="{{ asset('img/landing-login-register/square5.png') }}">
            </div>
            <div class="tl-desc right">
                <h3>Babak Final <span class="purple-txt">(Poster)</span></h3>
                <p>9 Oktober 2021</p>
            </div>
        </div>
        <div class="tl-line left">
            <div class="tl-desc left">
                <h3>Babak Final <span class="yellow-txt">(Olympiad)</span></h3>
                <p>10 Oktober 2021</p>
            </div>
            <div class="content">
                <img style="height: 50%" src="{{ asset('img/landing-login-register/square4.png') }}">
            </div>
            <div>
            </div>
        </div>
        <div class="tl-line right">
            <div>
            </div>
            <div class="content">
                <img style="height: 45%" src="{{ asset('img/landing-login-register/square5.png') }}">
            </div>
            <div class="tl-desc right">
                <h3>🌟 Pengumuman Pemenang 🌟</h3>
                <p>10 Oktober 2021</p>
            </div>
        </div>
    </div>
    <!-- Timeline end -->

    <!-- Box Sponsor dan Medpar -->
    <div class="">
        <div class="bintang">
            {{-- <img src="{{ asset('img/landing-login-register/bintang.png') }}"> --}}
            <picture>
                <source srcset="{{ asset('img/landing-login-register/bintang.png') }}" media="(min-width: 1200px)" />
                <img src="{{ asset('img/landing-login-register/bintang-sm.png') }}" alt="Baby Sleeping" />
            </picture>
        </div>
        {{-- SPONSOR --}}
        <div class="title">
            <h2 class="gradient">Sponsor</h2>
        </div>
        <div class="sponsor">
            <div class="sponsor-img">
                <img src="{{ asset('img/landing-login-register/sponsor/RedDoorz.jpeg')}}" alt="RedDoorz">
            </div>
            <div class="sponsor-img">
                <img src="{{ asset('img/landing-login-register/sponsor/Pahamify.jpg')}}" alt="Pahamify">
            </div>
            <div class="sponsor-img">
                <img src="{{ asset('img/landing-login-register/sponsor/Logo Codepolitan.png')}}" alt="CodePolitan">
            </div>
            <div class="sponsor-img">
                <img src="{{ asset('img/landing-login-register/sponsor/cicil.png')}}" alt="Cicil">
            </div>
            <div class="sponsor-img">
                <img src="{{ asset('img/landing-login-register/sponsor/bantex.png')}}" alt="Bantex">
            </div>
        </div>
        {{-- MEDPART --}}
        <div class="title" style="margin-top: 2rem">
            <h2 class="gradient">Media Partner</h2>
        </div>
        <div class="medpart">
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/InfoLombaBeasiswa.png')}}" alt="Info Lomba & Beasiswa">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/InfoLombaEvent.png')}}" alt="Info Lomba Event">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/InfoLombaInd.png')}}" alt="Info Lomba IND">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/JagatLomba.png')}}" alt="Jagat Lomba">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/LombaSma.png')}}" alt="Lomba SMA">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/OlimpiadeUpdate.png')}}" alt="Olimpiade Update">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/LombaUpdate.png')}}" alt="Lomba Update">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/Bem.png')}}" alt="Bem">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/BemFST.png')}}" alt="BEM FST">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/event_mahasiswa.png')}}" alt="Event Mahasiswa">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/infoeventjatim.png')}}" alt="Info Event Jatim">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/info_olimpiade.jpg')}}" alt="Info Olimpiade">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/MathQnA.jpg')}}" alt="Math QnA">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/event_kampus.png')}}" alt="Event Kampus">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/infoolimpiade.png')}}" alt="Info Olimpiade">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/eventpelajar.png')}}" alt="Event Pelajar">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/info_event.png')}}" alt="Info Event">
            </div>
            <div class="medpart-img">
                <img src="{{ asset('img/landing-login-register/mediapartner/kompetisi_mahasiswa.png')}}" alt="Kompetisi Mahasiswa">
            </div>
        </div>
        <div class="bintang">
            <img src="{{ asset('img/landing-login-register/Border.png') }}">
        </div>
        <div id="contact-us"  class="title">
            <h2 class="gradient">Contact Us</h2>
        </div>
        <div class="contact-group">
            @include('template.cp')
        </div>
        <br>
        <br>
        <p onclick="credit()" id="credit">© Copyright ISAC 2021. All Rights Reserved</p>
        <br>
    </div>
    <!-- Box Sponsor dan Medpar End -->

    <!-- Footer -->
    <!-- Footer end -->
    <script src="{{ asset('js/landing/script.js') }}"></script>
</body>

</html>
