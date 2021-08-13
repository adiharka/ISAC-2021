<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table>
        <thead>
            <tr>
                <th width='3'>ID</th>
                <th width='25'>Nama Tim</th>
                <th width='100'>Link Google Drive</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->teamname }}</td>
                <td><a href="{{ $team->poster_link }}">{{ $team->poster_link }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

