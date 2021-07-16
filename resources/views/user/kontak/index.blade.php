@extends('user.master')

@section('header')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<script>
    document.getElementById('nav-kontak').className = 'nav-item active';
</script>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Kontak Panitia ISAC 2021</h3>
    </div>
    <div class="card-body">
        @include('template.error')
        @include('template.cp')

    </div>

</div>
@endsection
