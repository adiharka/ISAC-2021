@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-peserta').className = 'nav-link active';
</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">List Semua Peserta</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Peserta</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="row">
    <div class="card mx-2">
        <div class="card-header">
            <h5 class="m-0">Total Peserta</h5>
        </div>
        <div class="card-body">
            <h3 class="">{{ $member->count() }}</h3>
        </div>
    </div>
    <div class="card mx-2">
        <div class="card-header">
            <h5 class="m-0">Total Peserta Olim</h5>
        </div>
        <div class="card-body">
            <h3 class="">{{ $olimtotal }}</h3>
        </div>
    </div>
    <div class="card mx-2">
        <div class="card-header">
            <h5 class="m-0">Total Peserta Poster</h5>
        </div>
        <div class="card-body">
            <h3 class="">{{ $postertotal }}</h3>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
        <a target="_blank" class="btn btn-success" href="{{ route('admin.member.excel') }}" class="float-left">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
              </svg>
            Export Excel
        </a>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" id="table-search" onkeyup="search()" name="table_search"
                    class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table id="membertable" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th width='12px'>ID</th>
                    <th class="col">Nama</th>
                    <th class="col">Tim</th>
                    <th class="col">Lomba</th>
                    <th class="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($member as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->user->teamname }}</td>
                    <td>{{ $member->user->role }}</td>
                    <td style="padding: 0.5rem"> <a href="{{ route('teamdetail', ['id' => $member->user->id])}}"
                        class="btn btn-block btn-sm btn-default">Detail</a> </td>
                </tr>
                @empty
                <tr>
                    <td>Masih kosong, ayok semangat publikasinya :D</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<script>
    function search() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("table-search");
        filter = input.value.toUpperCase();
        table = document.getElementById("membertable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>

@endsection
