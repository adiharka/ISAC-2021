@extends('user.master')

@section('title', 'Akun')

@section('header')
<script>
    document.getElementById('nav-akun').className = 'nav-item active';
</script>
<link rel="stylesheet" href="{{ asset('css/card.css') }}">

@endsection

@section('content')
@include('template.error')
<div class="card">
    <div class="card-body">
            <div class="profile-card-6">
                <div class="profile-name">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                        <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                    </svg>
                    Tim {{ $tim->teamname }}
                    <a href="{{ route('user.akun.password')}}" class="btn"><small>Ganti Password</small></a>
                </div>
                    <div class="profile-position">
                        <h4>Lomba yang diikuti</h4>
                        @if ($tim->role == 'olim')
                        <p>Olimpiade</p>
                        @else
                        <p>Poster</p>
                        @endif
                        <h4>Status Akun</h4>
                        @if ($tim->verified)
                        <p>Telah diverifikasi</p>
                        @else
                        <p>Belum diverifikasi</p>
                        @endif
                        <h4>Sekolah</h4>
                        <p>{{ $tim->school }}, {{ $tim->school_city }}, {{ $tim->school_province }}</p>
                </div>
            </div>

        <div class="d-md-flex flex-nowrap" style="flex-grow: 1; gap:0.75rem">
            @foreach ($members as $member)
            <div class="card" style="">
                <img class="card-img-top" src="{{$member->photoID}}" style="object-fit:cover; height:275px;"
                    alt="Foto Peserta" onerror="this.onerror=null;this.src='{{ asset('img/default.jpg') }}';">
                @if (!$member->profil_lengkap)
                <span class="bg-danger text-center">Mohon lengkapi data</span>
                @endif
                <h3 class="card-header border-bottom-0">
                    {{ $member->name }}
                </h3>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">
                               <strong>Posisi :</strong> <small>{{ ($member->leader == 1) ? 'Ketua' : 'Anggota' }}</small>
                            </p>
                            <p class="mb-0">
                                <strong>Foto :</strong> <small> {{ $member->student_photo}}</small>
                            </p>
                            <p class="mb-0">
                                <strong>Tgl lahir :</strong> <small>{{ $member->borndate }}</small>
                            </p>
                            <p class="mb-0">
                                <strong>Line :</strong> <small>{{ $member->line }}</small>
                            </p>
                            <p class="mb-0">
                                <strong>Whatsapp :</strong> <small>{{ $member->whatsapp }}</small>
                            </p>
                            <p class="mb-0">
                                <strong>Foto Kartu Pelajar :</strong> <small>{{ $member->student_card }}</small>
                            </p>
                        </div>
                    </div>
                </div>
                @if (!Auth::user()->verified)
                <div class="card-footer">
                    <div class="text-right">
                        <button type="button" id="edit-item" class="btn btn-primary" data-toggle="modal"
                            data-target="#edit-modal" data-id="{{ $loop->index }}" data-name="{{ $member->name }}"
                            data-borndate="{{ $member->borndate }}" data-photolink="{{ $member->student_photo }}"
                            data-line="{{ $member->line }}" data-whatsapp="{{ $member->whatsapp }}" data-student_card="{{ $member->student_card }}">
                            Edit Profil
                        </button>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <!-- Modal -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Profil</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.akun.update', '1') }}" id="edit-form" method="POST">
                            @csrf
                            @method('PUT')
                            <input class="form-control" type="text" name="id" id="id" style="display: none">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <p id="name"></p>
                                {{-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                            </div>
                            <div class="mb-3">
                                <label for="borndate" class="form-label">Tanggal Lahir (tgl/bulan/tahun)</label>
                                <input name="borndate" type="date" class="form-control" id="borndate">
                            </div>
                            <div class="mb-3">
                                <label for="line" class="form-label">ID Line</label>
                                <input name="line" type="text" class="form-control" id="line">
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
                                <input name="whatsapp" type="text" class="form-control" id="whatsapp">
                            </div>
                            <div class="mb-3">
                                <label for="photolink" class="form-label">Link Google Drive Foto Peserta</label>
                                <input name="photolink" type="text" class="form-control" id="photolink">
                                <div id="photolinkHelp" class="form-text small">Pastikan hak akses sudah dibuka untuk
                                    umum agar gambar dapat tampil</div>
                            </div>
                            <div class="mb-3">
                                <label for="student_card" class="form-label">Link Google Drive Foto Kartu Pelajar</label>
                                <input name="student_card" type="text" class="form-control" id="student_card">
                                <div id="photolinkHelp" class="form-text small">Pastikan hak akses sudah dibuka untuk
                                    umum agar gambar dapat tampil</div>
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
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).on("click", "#edit-item", function () {
        // get the data
        var id = $(this).data("id");
        var name = $(this).data('name');
        var borndate = $(this).data('borndate');
        var photolink = $(this).data('photolink');
        var line = $(this).data('line');
        var whatsapp = $(this).data('whatsapp');
        var student_card = $(this).data('student_card');

        // fill the data in the input fields
        $("#id").val(id);
        $("#name").text(name);
        $("#photolink").val(photolink);
        $("#borndate").val(borndate);
        $("#line").val(line);
        $("#whatsapp").val(whatsapp);
        $("#student_card").val(student_card);
    })

</script>
@endsection
