@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-home').className = 'nav-link active';

</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Home</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $count }}</h3>
                <p>Tim terdaftar</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href=" {{ route('teamlist')}} " class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $olim->count() }} <small>({{ $olim->where('verified', 1)->count() }} terverifikasi)</small></h3>
                <p>Tim terdaftar Olimpiade</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href=" {{ route('admin.team.olimpiade.index')}} " class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $poster->count() }} <small>({{ $poster->where('verified', 1)->count() }} terverifikasi)</small></h3>
                <p>Tim terdaftar Poster</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href=" {{ route('admin.team.poster.index')}} " class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Jumlah Peserta</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title">{{ $member->count() }}</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Jumlah Peserta Sudah Melengkapi Data</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title">{{ $member->where('profil_lengkap', 1)->count() }}</h6>
            </div>
        </div>

    </div>
    <!-- /.col-md-6 -->
</div>
@endsection
