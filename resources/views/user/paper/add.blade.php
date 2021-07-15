@extends('user.master')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Upload Paper</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Layout</a></li>
        <li class="breadcrumb-item active">Top Navigation</li>
    </ol>
</div><!-- /.col -->
@endsection

@section('content')
    <form action="{{ route('paperAdd') }}" method="POST">
        @csrf
        <div class="card-body">
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something it's wrong:
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif

            <div class="form-group">
                <label for="link">Link Gdrive</label>
                <p>Link berupa folder berisi file dan bukti keaslian karya tulis</p>
                <input type="text" class="form-control" name="link" placeholder="https://drive.google.com/xxx">
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>
@endsection