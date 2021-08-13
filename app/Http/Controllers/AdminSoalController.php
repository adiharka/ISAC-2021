<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Packet;
use App\Models\Question;
use App\Models\TakePacket;
use Illuminate\Http\Request;
use Session;

class AdminSoalController extends Controller
{
    public function index() {
        $packets = Packet::get();
        $soals = Question::get();
        return view('admin.soal.index', compact('packets', 'soals'));
    }

    public function show($id) {
        $packets = Packet::get();
        $packet = Packet::find($id);
        $questions = Question::where('packet_id', $id)->get();
        return view('admin.soal.show', compact('packets', 'packet', 'questions', 'id'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'question_count' => 'required',
            'open' => 'required',
            'close' => 'required',
            'duration' => 'required',
        ]);

        if ($request->visible == 'on') {
            $visible = 1;
        } else {
            $visible = 0;
        }


        $paket = Packet::find($id);
        $paket->name = $request->name;
        $paket->visible = $visible;
        $paket->detail = $request->detail;
        $paket->question_count = $request->question_count;
        $paket->open = $request->open;
        $paket->close = $request->close;
        $paket->duration = $request->duration;
        $save = $paket->save();

        if ($save) {
            Session::flash('success', 'Sukses mengupdate info');
            return redirect()->route('admin.soal.show', $id);
        } else {
            Session::flash('errors', ['' => 'Gagal!']);
            return back();
        }
    }

    public function calculate($id) {
        $questions = Question::where('packet_id', $id)->get();
        foreach ($questions as $key => $question) {
            $answers = Answer::where('question_id', $question->id)->get();
            $correctCount = 0;
            $answerCount = $answers->count();
            // dd($answerCount);
            foreach ($answers as $key2 => $answer) {
                if ($answer->answer == $question->right_answer) {
                    $correctCount += 1;
                }
            }
            if ($correctCount != 0 && $answerCount != 0) {
                $percentage = $correctCount / $answerCount;
            } else {
                $percentage = 1;
            }
            switch (true) {
                case $percentage >= 0.55:
                    $question->point = 1;
                    break;
                case $percentage >= 0.35:
                    $question->point = 2;
                    break;
                case $percentage >= 0.2:
                    $question->point = 3;
                    break;
                default:
                    $question->point = 4;
            }
            $question->save();
        }

        $takepackets = TakePacket::where('packet_id', $id)->get();
        foreach ($takepackets as $key => $takepacket) {
            $mark = 0;
            $answers = Answer::where('packet_id', $id)->where('user_id', $takepacket->user_id)->get();
            foreach ($answers as $key2 => $answer) {
                if ($answer->answer == $answer->question->right_answer) {
                    $mark += $answer->question->point;
                }
            }
            $takepacket->mark = $mark;
            $takepacket->save(['timestamps' => false]);
        }

        return redirect()->route('admin.soal.show', $id)->with('success', 'Sukses kalkulasi ulang');
    }
}
