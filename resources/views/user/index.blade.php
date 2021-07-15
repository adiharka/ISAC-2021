@extends('user.master')

@section('header')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<script>
    document.getElementById('nav-dashboard').className = 'nav-item badge-pill badge-dark';
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
        <h5>Terimasih telah mendaftar ISAC 2021, pantau terus timelinenya ya!</h5>
        @else
            <div class="d-flex">
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
            <p class="ml-3">Setelah yakin semua data sudah benar harap menghubungi kontak panitia berikut agar akun kamu segera terverifikasi</p>
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
                        <div id="photolinkHelp" class="form-text small">Pastikan hak akses sudah dibuka untuk umum agar
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
