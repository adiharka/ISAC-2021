@extends('user.master')

@section('title', '- Melengkapi Data')

@section('header')
<script>
    document.getElementById('nav-akun').className = 'nav-link active';
</script>

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Melengkapi Data</h3>
        </div>
        <div class="card-body">
            @include('template.error')
            <form action="{{ route('user.akun.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama</label>
                  <p>{{ $member->name }}</p>
                  {{-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                </div>
                <div class="mb-3">
                    <label for="borndate" class="form-label">Tanggal Lahir</label>
                    <input name="borndate" value="{{ old('borndate', $member->borndate) }}" type="date" class="form-control" id="borndate">
                </div>
                <div class="mb-3">
                    <label for="photolink" class="form-label">Link Foto</label>
                    <input name="photolink" value="{{ old('photolink', $member->photolink) }}" type="text" class="form-control" id="photolink">
                    <div id="photolinkHelp" class="form-text">Pastikan hak akses sudah dibuka untuk umum agar gambar dpt tampil</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>

    </div>
@endsection
