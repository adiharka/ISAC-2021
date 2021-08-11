@extends('user.master')

@section('header')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<script>
    document.getElementById('nav-dashboard').className = 'nav-item active';
</script>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Halo, tim {{ Auth::user()->teamname }}</h3>
    </div>
    <div class="card-body">
        @include('template.error')
        @if (Auth::user()->verified)
            {{-- CEK OLIM / POSTER --}}
            @if (Auth::user()->role == 'olim')
            @foreach ($packets as $packet)
                <a class="card1" href="{{ route('user.soal.attempt', $packet->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                      </svg>
                    <h4>{{ $packet->name }}</h4>
                    <p class="small m-0">Status : Belum dikerjakan</p>
                    <div class="dimmer"></div>
                    <div class="go-corner" href="#">
                        <div class="go-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
                                <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z"/>
                              </svg>
                        </div>
                    </div>
                </a>
            @endforeach
            @include('template.countdown')
            @foreach ($ongoings as $ongoing)
            <a class="card1 ongoing" href="{{ route('user.soal.attempt', $ongoing->packet->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                  </svg>
                <h4>Sisa : <span id="timer-{{ $loop->index }}" data-countdown="{{ $ongoing->end }}" data-id="{{ $ongoing->packet->id }}"></span></h4>
                <script>
                    el = 'timer-' + {!! json_encode($loop->index) !!};
                    countDown(el);
                </script>
                <p class="small m-0">{{ $ongoing->packet->name }}</p>
                <p class="small m-0">Status : Sedang berlangsung</p>
                <div class="dimmer"></div>
                <div class="go-corner" href="#">
                    <div class="go-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                          </svg>
                    </div>
                </div>
            </a>
            @endforeach
            @foreach ($finishedpackets as $finish)
            <div class="card1 done">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                  </svg>
                <h4>{{ $finish->packet->name }}</h4>
                <p class="small m-0">Status : Sudah dikerjakan</p>
                <div class="dimmer"></div>
                <div class="go-corner" href="#">
                    <div class="go-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                          </svg>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h5>Terimasih telah mendaftar ISAC 2021, pantau terus timelinenya ya!</h5>

            @endif
        @else
            <div class="card-group">
                @if (!$lengkap)
                <a class="card1" href="{{ route('user.akun.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor"
                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <h4>Yuk lengkapin data diri peserta</h4>
                    {{-- <p class="small">Card description with lots of great facts and interesting details.</p> --}}
                    <div class="dimmer"></div>
                    <div class="go-corner" href="#">
                        <div class="go-arrow">
                            →
                        </div>
                    </div>
                </a>
                @else

                @endif
                @if ($bayar)
                <button type="button" id="edit-item" data-toggle="modal" data-target="#edit-modal" class="card1"
                    href="{{ route('user.akun.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" class="bi bi-wallet2"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <h4>Yuk bayar biaya pendaftaran</h4>
                    {{-- <p class="small">Card description with lots of great facts and interesting details.</p> --}}
                    <div class="dimmer"></div>
                    <div class="go-corner" href="#">
                        <div class="go-arrow">
                            →
                        </div>
                    </div>
                </button>
                @else
                <button type="button" id="edit-item" data-toggle="modal" data-target="#edit-modal" class="card1"
                    href="{{ route('user.akun.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" class="bi bi-wallet2"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <h4>Ganti foto bukti transfer</h4>
                    {{-- <p class="small">Card description with lots of great facts and interesting details.</p> --}}
                    <div class="dimmer"></div>
                    <div class="go-corner" href="#">
                        <div class="go-arrow">
                            →
                        </div>
                    </div>
                </button>
            </div>
            <br>
            <p class="ml-3">Pastikan data sudah lengkap dan benar. Lalu, hubungi kontak panitia berikut agar akun kamu segera diverifikasi</p>
            @include('template.cp')
            @endif
        @endif

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Pembayaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.akun.bayar') }}" id="edit-form" method="POST">
                    @csrf
                    @method('PUT')

                    <h5>Mohon lakukan transfer untuk dapat mengikuti lomba</h5>
                    <div class="alert">
                        <h6>→ Biaya Pendaftaran</h6>
                        <p style="margin: 0">Olimpiade Batch 1 : Rp 75.000,00</p>
                        <p style="margin-bottom: 4px">Olimpiade Batch 2 : Rp 85.000,00</p>
                        <p style="margin: 0">Poster Batch 1 : Rp 35.000,00</p>
                        <p>Poster Batch 2 : Rp 45.000,00</p>
                        <h6>→ Rekening Tujuan</h6>
                        <p style="margin: 0">BRI - 657801020963530 (a.n Ermawati)</p>
                        <p>MANDIRI - 1400019877563 (a.n Amelia Nabilah)</p>
                    </div>
                    <div class="mb-3">
                        <label for="payment_photo" class="form-label">Link Foto Bukti Transfer</label>
                        <input name="payment_photo" type="text" class="form-control" id="payment_photo"
                            value="{{ Auth::user()->payment_photo }}">
                        <div id="photolinkHelp" class="form-text small">Format nama file : NamaBank_NamaTim. Pastikan hak akses sudah dibuka untuk umum agar
                            gambar dapat dilihat panitia</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
