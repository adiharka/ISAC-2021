@extends('user.master')

@section('title', 'Ganti Password')

@section('header')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Ganti Password</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user.akun.updatePassword') }}">
            @csrf

             @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
             @endforeach

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                <div class="col-md-6">
                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                <div class="col-md-6">
                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Update Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
