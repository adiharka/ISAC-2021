<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Packet;
use App\Models\Question;
use App\Models\TakePacket;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AdminJawabanController extends Controller
{
    public function index() {
        $packets = Packet::get();
        $soals = Question::get();
        $answers = Answer::get();
        return view('admin.jawaban.index', compact('packets', 'soals'));
    }

    public function show($id) {
        $packets = Packet::get();
        $packet = Packet::find($id);
        $questions = Question::where('packet_id', $id)->get();
        $users = User::where('role', 'olim')->get();
        $takepackets = TakePacket::where('packet_id', $id)->get();
        $best = TakePacket::where('packet_id', $id)->orderBy('mark', 'desc')->first();
        if (TakePacket::where('packet_id', $id)->exists()) {
            $bestUser = User::find($best->user_id);
        }
        else {
            $bestUser = collect(new TakePacket);
            $bestUser->teamname = "";
            $bestUser->school = "";
        }
        $answers = Answer::where('packet_id', $id)->orderBy('question_id', 'asc')->get();
        return view('admin.jawaban.show', compact('packets', 'packet', 'users', 'best', 'bestUser', 'questions', 'takepackets', 'answers', 'id'));
    }
}
