@extends('user.master')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Edit Paper</h1>
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
            <div class="card">
                <div class="card-header">
                    <h3> Selamat datang orang ber-id {{ $id }} </h3>
                </div>
                <form action="{{ route('paperEdit') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="card-body">
                        <h4> Monggo diedit link papernya </h4>
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
                            <input type="text" class="form-control" value="{{ old('link', $link)}}" name="link"
                            placeholder="https://drive.google.com/xxx">
                            <h6><small>Link berupa folder berisi file dan bukti keaslian karya tulis</small></h6>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
@endsection