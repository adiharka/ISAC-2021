@extends('admin.master')


@section('header')

<script>
    document.getElementById('nav-answer').className = 'nav-item menu-open';
    document.getElementById('nav-answer-' + {{ $id }}).className = 'nav-link active';

</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $packet->name }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.answer.index') }}">List Jawaban</a></li>
            <li class="breadcrumb-item active">{{ $packet->name }}</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="row">
    <div class="card mx-2">
        <div class="card-header">
            <h5 class="m-0">Tim Terbaik</h5>
        </div>
        <div class="card-body">
            <h6 class="">Tim {{ $bestUser->teamname }}</h6>
            <li class="">{{ $bestUser->school }}</li>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Total Tim</h5>
        </div>
        <div class="card-body">
            <h3 class="">{{ $takepackets->count() }}</h3>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
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
                <th>Total Point</th>
            </thead>

            <tbody>
                @foreach ($takepackets as $takepacket)
                <tr data-toggle="collapse" data-target="#accordion{{ $takepacket->id }}" class="clickable">
                    <td>{{  $loop->iteration  }}</td>
                    <td><a href="{{ route('teamdetail', $users->find($takepacket->user_id)->id) }}">{{ $users->find($takepacket->user_id)->teamname }}</a></td>
                    <td>{{ $takepacket->mark }}</td>
                </tr>
                <tr>
                    <td class='py-0 detail'>
                        <div id="accordion{{ $takepacket->id }}" class="collapse"></div>
                    </td>
                    <td colspan="2" class='py-0 detail'>
                        @foreach ($answers->where('user_id', $takepacket->user_id) as $answer)
                        <div id="accordion{{ $takepacket->id }}" class="collapse">{{ $answer->question->number }}. {{ $answer->answer }} ({{ $answer->question->right_answer }})
                            @if ($answer->answer != $answer->question->right_answer)
                            ❌
                            @else
                            {{ $answer->question->point }} poin
                            @endif
                        </div>
                        @endforeach
                    </td>
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
