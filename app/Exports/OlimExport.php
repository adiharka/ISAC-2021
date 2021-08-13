<?php

namespace App\Exports;

use App\Models\Answer;
use App\Models\Question;
use App\Models\TakePacket;
use Maatwebsite\Excel\Concerns\FromCollection;

// class OlimExport implements FromCollection
// {
//     function __construct($id) {
//         $this->id = $id;
//     }
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         $res = collect();
//         $packetCount = TakePacket::where('packet_id', $this->id)->count();
//         $answer = Answer::where('packet_id', $this->id)->get()->pluck('answer');
//         for ($i=0; $i < $packetCount ; $i++) {
//             $res->push(['tes'=>1, 'dua'=>2, $answer]);
//         }
//         dd($res);
//         return $res;
//     }
// }

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OlimExport implements FromView
{
    function __construct($id) {
        $this->id = $id;
    }

    public function view(): View
    {
        $id = $this->id;
        $packets = TakePacket::where('packet_id', $id)->get();
        $questions = Question::where('packet_id', $id)->get();

        return view('admin.jawaban.excel', compact('packets', 'id' , 'questions',));
    }
}
