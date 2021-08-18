@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-soal').className = 'nav-item menu-open';
    document.getElementById('nav-soal-pertanyaan').className = 'nav-link active';
</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Semua Paket Soal</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">List Soal</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

        {{-- <a class="float-left" href="{{ route('admin.soal.edit', $id) }}">Pengaturan Soal</a> --}}
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
        <table id="soaltable" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th width='12px'>ID</th>
                    <th class="col">Nama</th>
                    <th class="col">Soal Total</th>
                    <th class="col">Soal Diberikan</th>
                    <th class="col">Buka</th>
                    <th class="col">Tutup</th>
                    <th class="col">Durasi</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($packets as $packet)
                <tr>
                    <td>{{ $packet->id }}</td>
                    <td>
                        <a href="{{ route('admin.soal.show', $packet->id) }}">
                            {{ $packet->name }}
                        </a>
                        </td>
                    <td>{{ $soals->where('packet_id', $packet->id)->count() }}</td>
                    <td>{{ $packet->question_count }}</td>
                    <td>{{ $packet->open }}</td>
                    <td>{{ $packet->close }}</td>
                    <td>{{ $packet->duration }}</td>
                </tr>
                @empty
                <tr>
                    <td>Belum ada paket soal</td>
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
        table = document.getElementById("soaltable");
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
