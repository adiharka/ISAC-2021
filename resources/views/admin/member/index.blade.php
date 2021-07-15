@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-peserta').className = 'nav-item menu-open';
    document.getElementById('nav-peserta-all').className = 'nav-link active';
</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Starter Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

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
