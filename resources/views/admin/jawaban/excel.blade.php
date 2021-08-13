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
                <th width='20'>Nama Tim</th>
                <th width='5'>Nilai</th>
                <th>Waktu Start</th>
                <th>Waktu Selesai</th>
                @foreach ($questions as $question)
                <th width='8'>{{ $loop->iteration }}. [{{ $question->right_answer }}] [{{ $question->point }}] {{ $question->question }}</th>
                @endforeach
                <th>Urutan Soal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packets as $packet)
            <tr>
                <td>{{ $packet->user_id }}</td>
                <td>{{ $packet->user->teamname }}</td>
                <td style="text-align: center;">{{ $packet->mark }}</td>
                <td>{{ Carbon\Carbon::parse($packet->start)->format('H:i:s - d M Y') }}</td>
                <td>{{ Carbon\Carbon::parse($packet->updated_at)->format('H:i:s - d M Y') }}</td>
                @foreach ($questions as $question)
                <?php
                    $answerss = \App\Models\Answer::where('packet_id', $id)->where('user_id', $packet->user_id);
                    $answers = \App\Models\Answer::where('packet_id', $id)->where('user_id', $packet->user_id)->get();
                    // dd($answerss)
                ?>
                @if ($answerss->where('question_id', $question->id)->exists())
                    <?php
                    $answer = $answers->where('question_id', $question->id)->first()->answer;
                    ?>
                    @if ($question->right_answer == $answer)
                        <td style="text-align: center;" >{{ $answer }}</td>
                    @else
                        <td style="text-align: center; background-color: #f19595;">{{ $answer }}</td>
                    @endif
                @else
                    <td style="text-align: center; background-color : #000000;">X</td>
                @endif
                @endforeach
                <td>{{ $packet->question_order }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

