@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-poster').className = 'nav-link active';

</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Poster Peserta</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">List Poster</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="row">
    <div class="card mx-2">
        <div class="card-header">
            <h5 class="m-0">Tim Telah Mengumpulkan</h5>
        </div>
        <div class="card-body">
            <h3 class="">{{ $count }} tim</h3>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <a target="_blank" class="btn btn-success" href="{{ route('admin.poster.excel') }}" class="float-left">
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

    <div class="card-body table-responsive p-0">
        <table id="soaltable" class="table table-hover">
            <thead>
                <th width='50px'>No</th>
                <th>Tim</th>
                <th>Link Google Drive</th>
            </thead>

            <tbody>
                @foreach ($teams as $team)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td><a href="{{ route('teamdetail', $team->id) }}">{{ $team->teamname }}</a></td>
                    <td><a href="{{ $team->poster_link }}" target="_blank">{{ $team->poster_link }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

</div>

<script>
    function search() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("table-search");
        filter = input.value.toUpperCase();
        table = document.getElementById("soaltable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                classname = td.className;
                if (txtValue.toUpperCase().indexOf(filter) > -1 || classname == 'py-0 detail') {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>

@endsection
