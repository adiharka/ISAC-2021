@extends('admin.master')


@section('header')
<script>
    document.getElementById('nav-tim').className = 'nav-item menu-open';
</script>

<div class="row mb-2">
    <div class="col-sm-6">
        @if ($status)
        <h1 class="m-0 text-dark">Detail Tim {{$team->teamname}}
        @if ($team->verified)
        <span class="">☑</span>
        @else
            <span class="badge badge-danger">❌Belum Terverifikasi</span>
        @endif
        </h1>
        @else
        <h1 class="m0 text-dark">Tim tidak ditemukan</h1>
        @endif
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard')}} ">Home</a></li>
            <li class="breadcrumb-item"><a href=" {{ route('teamlist')}} ">Team</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')

<!-- Default box -->
<div class="card card-solid">
    @if ($status)

    {{-- INFO TIM --}}
    <div class="card-header">
        <h3 class="text-muted">Info Tim</h3>
        @if (!$team->verified)
        <form action="{{ route('admin.verifikasi', $team->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin untuk verifikasi?');">Verifikasi</button>
        </form>
        @endif
    </div>
    <div class="card-body pb-0">
        <p><b>Nama Tim : </b> {{$team->teamname}} </p>
        <p><b>Lomba yg diikuti : </b> {{$team->role}} </p>
        <p><b>Email : </b> {{$team->email}} </p>
        <p><b>Asal Sekolah : </b> {{$team->school}} </p>
        <p><b>Kabupaten Sekolah : </b> {{$team->school_city}} </p>
        <p><b>Provinsi Sekolah : </b> {{$team->school_province}} </p>
        <p><b>Bukti Bayar : </b> <a href="{{ $team->payment_photo }}">{{$team->payment_photo}}</a></p>
        <p><b>Status : </b>
            @if ($team->verified)
                Terverifikasi
            @else
                Belum Terverifikasi
            @endif </p>
    </div>

    {{-- HASIL LOMBA --}}
    @if ($team->role == 'olim')
        <div class="card mx-3">
            <div class="card-header bg-dark">
                Soal yang telah dikerjakan
            </div>
            @foreach ($takepackets as $takepacket)
            <div class="card-body">
                <a href="{{ route('admin.team.olimpiade.show', $takepacket->id) }}">{{ $takepacket->packet->name }} -> {{ $takepacket->mark }}</a>
            </div>
            @endforeach
        </div>

    @else

    @endif

    {{-- INFO PESERTA --}}
    <div class="card-header">
        <h3 class="text-muted">Info Peserta</h3>
    </div>
    <div class="card-body pb-0">
        <div style="gap:0.75rem" class="d-inline-flex flex-wrap">
            @forelse ($members as $member)
            <div class="card bg-light">
                <h3 class="card-header border-bottom-0">
                    {{ $member->name }}
                </h3>
                @if ($member->profil_lengkap)

                @else
                    <span class="badge badge-danger">Belum melengkapi data</span>
                @endif
                <div class="card-body pt-0">
                    <div class="row" style="max-width: 350px">
                        <div class="col">
                            <p class="m-0"><b>Status: </b>
                                {{ ($member->leader == 1) ? 'Ketua' : 'Anggota' }} </p>
                                <p class="m-0"><b>Foto :</b> <a href="{{ $member->student_photo}}">{{ $member->student_photo}}</a></p>
                                <p class="m-0"><b>Foto Kartu Pelajar :</b> <a href="{{ $member->student_card}}">{{ $member->student_card}}</a></p>
                                <p class="m-0"><b>Line :</b> {{ $member->line }}</p>
                                <p class="m-0"><b>Whatsapp :</b> {{ $member->whatsapp }}</p>
                                <p class="m-0"><b>Tanggal Lahir :</b> {{ $member->borndate }}</p>
                            </div>
                        </div>
                        <img class="card-img-top" src="{{ $member->photoID }}" alt="" width="125px">
                </div>
            </div>
            @empty
            <p>Seluruh panitia ISAC 2021 :D</p>
            @endforelse
        </div>
    </div>

    {{-- ACTIVITY LOG --}}
    <div class="card-header">
        <h3 class="text-muted">Log Aktifitas</h3>
    </div>
    <div class="card-body pb-0">
        <!-- The time line -->
        <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
                <span class="bg-red">Aktifitas</span>
            </div>
            <!-- /.timeline-label -->
            @foreach ($logs->reverse() as $log)
            <div>

                @if ($log->type == 1)
                <i class="fas fa-user bg-green"></i>
                @elseif ($log->type == 2)
                <i class="fas fa-user bg-yellow"></i>
                @elseif ($log->type == 3)
                <i class="fas fa-user bg-blue"></i>
                @else
                <i class="fas fa-user bg-red"></i>

                @endif
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{$log->created_at}} </span>
                    <h3 class="timeline-header no-border"><a href="#">{{$log->user->teamname}}</a> {{$log->event}}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.card-body -->

    {{-- KALO PENGGUNA GA KETEMU --}}
    @else
    <div class="card-body pb-0">
    <p>Tim dengan ID {{$id}} tidak ditemukan</p>
    </div>
    @endif
</div>
<!-- /.card -->



@endsection
