<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table>
        <thead>
            <tr>
                <th width='5' style="text-align: center;">ID</th>
                <th width='25'>Asal Sekolah</th>
                <th width='20'>Nama Tim (ungu:gel.2)</th>
                <th width='3'>Terverifikasi?</th>
                <th width='6'>Lomba</th>
                <th width='35'>Nama Peserta (biru:ketua)</th>
                <th width='15'>Line</th>
                <th width='15'>Whatsapp</th>
                <th width='12'>Tgl Lahir</th>
                <th width='20'>Foto</th>
                <th width='20'>Foto Kartu Pelajar</th>
                <th width='20'>Tgl Daftar</th>
                <th width='30'>Daerah Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td style="text-align: center;">{{ $member->id }}</td>
                <td>{{ $member->user->school }}</td>

                {{-- UNGU -> daftar gelombang 2 --}}
                @if ( Carbon\Carbon::parse($member->user->created_at) <= Carbon\Carbon::createFromFormat('d/m/Y H:i:s', '04/08/2021 00:01:00') )
                <td style="text-align: left;">{{ $member->user->teamname }}</td>
                @else
                <td style="text-align: left; background-color: #eaa9df;">{{ $member->user->teamname }}</td>
                @endif

                {{-- MERAH -> belum verif --}}
                @if ($member->user->verified)
                <td style="text-align: center; background-color: #aceaa9;">1</td>
                @else
                <td style="text-align: center; background-color: #e58d8d;">0</td>
                @endif
                <td>{{ $member->user->role }}</td>

                {{-- BIRU -> ketua --}}
                @if ($member->leader)
                <td style="background-color: #bfd8ea;">{{ $member->name }}</td>
                @else
                <td>{{ $member->name }}</td>
                @endif
                <td>{{ $member->line }}</td>
                <td>{{ $member->whatsapp }}</td>
                <td>{{ $member->borndate }}</td>
                <td><a>{{ $member->student_photo }}</a></td>
                <td><a>{{ $member->student_card }}</a></td>
                <td>{{ $member->user->created_at }}</td>
                <td>{{ $member->user->school_city }}, {{ $member->user->school_province }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

