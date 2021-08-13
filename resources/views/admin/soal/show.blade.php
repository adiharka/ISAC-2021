@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-soal').className = 'nav-item menu-open';
    document.getElementById('nav-soal-' + {{ $id }}).className = 'nav-link active';

</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $packet->name }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.soal.index') }}">List Soal</a></li>
            <li class="breadcrumb-item active">{{ $packet->name }}</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
        <button class="btn btn-primary" type="button" class="float-left" data-toggle="modal" data-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
              </svg>
            Pengaturan Soal
        </button>
        <a class="btn btn-info" href="{{ route('admin.soal.calculate', $id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-code" viewBox="0 0 16 16">
                <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8l3.147-3.146zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8l-3.147-3.146z"/>
              </svg>
              Kalkulasi poin
        </a>
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
    <div class="card-body table-responsive p-0">
        <table id="soaltable" class="table table-hover">
            <thead>
                <th width='50px'>No</th>
                <th>Pertanyaan</th>
                <th width='50px'>ID</th>
                <th>Poin</th>
                <th>Jawaban</th>
            </thead>

            <tbody>
                @foreach ($questions as $soal)
                <tr data-toggle="collapse" data-target="#accordion{{ $soal->id }}" class="clickable">
                    <td>{{ $loop->index+1 }}</td>
                    <td>{!! $soal->question !!}</td>
                    <td>{{ $soal->id }}</td>
                    <td>{{ $soal->point }}</td>
                    <td>{{ $soal->right_answer }}</td>
                </tr>
                <tr>
                    <td class='py-0 detail'>
                        <div id="accordion{{ $soal->id }}" class="collapse"></div>
                    </td>
                    <td colspan="3" class='py-0 detail'>
                        <div id="accordion{{ $soal->id }}" class="collapse">A. {{ $soal->A }}</div>
                        <div id="accordion{{ $soal->id }}" class="collapse">B. {{ $soal->B }}</div>
                        <div id="accordion{{ $soal->id }}" class="collapse">C. {{ $soal->C }}</div>
                        <div id="accordion{{ $soal->id }}" class="collapse">D. {{ $soal->D }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengaturan Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.soal.edit', $packet->id) }}" id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <input class="form-control" type="text" name="id" id="id" style="display: none">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input name="name" type="text" value="{{ $packet->name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        {{-- <div class="custom-control custom-checkbox">
                            <input name="visible" class="custom-control-input" type="checkbox" id="visible" {{ $packet->visible ? "checked" : "" }}>
                            <label for="visible" class="custom-control-label">Custom Checkbox</label>
                          </div> --}}
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                              <input type="checkbox" name="visible" class="custom-control-input" id="visible"  {{ $packet->visible ? "checked" : "" }}>
                              <label class="custom-control-label" for="visible">Dapat dilihat peserta</label>
                            </div>
                          </div>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail Soal</label>
                        <textarea class="form-control"  name="detail" id="detail" cols="30" rows="5">{{ $packet->detail }}</textarea>
                     </div>
                    <div class="mb-3">
                        <label for="question_count" class="form-label">Jumlah Soal</label>
                        <input name="question_count" value="{{ $packet->question_count }}" type="number"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="open" class="form-label">Waktu Buka</label>
                        <input name="open" type="datetime-local" value="{{ date("Y-m-d\TH:i:s", strtotime($packet->open)) }}" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}">
                    </div>
                    <div class="mb-3">
                        <label for="close" class="form-label">Waktu Tutup</label>
                        <input name="close" type="datetime-local" value="{{ date("Y-m-d\TH:i:s", strtotime($packet->close)) }}" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Durasi Pengerjaan (menit)</label>
                        <input name="duration" type="number" value="{{ $packet->duration }}" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.card-header -->

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
