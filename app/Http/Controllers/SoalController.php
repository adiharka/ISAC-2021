<?php

namespace App\Http\Controllers;

use App\Jobs\SetPacketFinished;
use App\Models\Answer;
use App\Models\TakePacket;
use App\Models\Packet;
use App\Models\Question;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Auth;
use Session;

class SoalController extends Controller
{
    public function attempt($id)
    {
        // Nampilin detail soal kalo belum take
        if (TakePacket::where('user_id', Auth::id())->where('packet_id', $id)->exists()) {
            // Udah pernah take, jadi langsung liat soal
            return redirect()->route('user.soal.show', [$id,1]);
        } else {
            // Belum take, ke detail soal dulu
            return redirect()->route('user.soal.detail', $id);
        }
    }

    public function detail($id)
    {
        $packet = Packet::find($id);
        $open = Carbon::parse($packet->open)->format('H:i - d M Y');
        $close = Carbon::parse($packet->close)->format('H:i - d M Y');
        if (Carbon::now() > $packet->close) {
            $status = "closed";
        } else if(Carbon::now() >= $packet->open){
            $status = "open";
        } else {
            $status = "notyet";
        }

        return view('user.soal.detail', compact('id', 'packet', 'open', 'close', 'status'));
    }

    public function take($id)
    {
        $packet = Packet::find($id);

        // Nampilin soal langsung kalo udh take
        if (TakePacket::where('user_id', Auth::id())->where('packet_id', $id)->exists()) {
            // Udah pernah take, jadi langsung liat soal
            return redirect()->route('user.soal.show', [$id,1]);
        } else {
            // NGECEK MASI SEMPAT GA (udh masuk jam && nggak lewat waktu)
            if (Carbon::now() >= $packet->open && Carbon::now() <= $packet->close) {
                // Belum take, lanjut take
                $questions = Question::where('packet_id', $id)->get();
                $take = new TakePacket();

                // Ngacak soal
                $numbers = range(1, $questions->count());
                shuffle($numbers);
                $shuffled = implode(";",$numbers);

                // Nyimpen info pengambilan soal
                $take->question_order = $shuffled;
                $take->user_id = Auth::id();
                $take->packet_id = $id;
                $take->end = Carbon::now()->addMinute($packet->duration);
                $save = $take->save();

                // Job untuk auto finish attempt klo waktu habis
                $takeid = $take->id;
                $job = (new SetPacketFinished($takeid))->delay(Carbon::now()->addMinutes($packet->duration));
                dispatch($job);

                // Membuat slot jawaban
                for ($i=0; $i < $packet->question_count; $i++) {
                    $answer = new Answer();
                    $answer->user_id = Auth::id();
                    $answer->question_id = $questions->skip($numbers[$i] - 1)->first()->id;
                    $answer->packet_id = $id;
                    $answer->number = $i + 1;
                    $answer->save();
                }

                $log = new Log;
                $log->user_id = Auth::id();
                $log->target_id = Auth::id();
                $log->event = 'Mulai mengerjakan ' . Packet::find($id)->name;
                $log->type = 2;
                $log->save();

                return redirect()->route('user.soal.show', [$id,1]);
            }
            else {
                Session::flash('errors', ['' => 'Paket soal tidak bisa diakses']);
                return redirect()->route('user.soal.detail', $id);
            }
        }

    }

    public function show($id, $no)
    {
        $no = floatval($no);
        $skip = $no - 1;

        $packet_status = TakePacket::where('user_id', Auth::id())->where('packet_id', $id)->first();
        if ($packet_status === null) {
            return redirect()->route('user.index');
        } else {
            // NGECEK MASI SEMPAT GA (udh masuk jam && nggak lewat waktu && belum finish attempt)
            if (Carbon::now() >= $packet_status->start && Carbon::now() <= $packet_status->end && !$packet_status->finished) {
                // MASI SEMPAT
                // Ngambil pertanyaan saat ini
                $answers = Answer::where('packet_id', $id)->where('user_id', Auth::id())->orderBy('number', 'asc');
                $currentAnswer = $answers->skip($skip)->limit(1)->first();
                $currentQuestion = $answers->skip($skip)->limit(1)->first()->question;
                $time = TakePacket::where('user_id', Auth::id())->where('packet_id', $id)->first()->end;

                // List Jawaban
                $answers = Answer::where('packet_id', $id)->where('user_id', Auth::id())->orderBy('number', 'asc')->get();

                return view('user.soal.show', compact('answers', 'currentQuestion', 'currentAnswer', 'id', 'no', 'time'));
            }
            // KALO WAKTU ABIS BAKAL UBAH STATUS JADI FINISHED
            if (Carbon::now() >= $packet_status->end) {
                return redirect()->route('user.soal.end', $id);
            }
            else {
                // MANA SEMPAT UDAH TELAT
                Session::flash('errors', ['' => 'Paket soal tidak bisa diakses']);

                return redirect()->route('user.index');
            }
        }

    }

    public function update(Request $request, $id, $update, $show)
    {
        $answer = Answer::find($update);
        $answer->answer = $request->input('answer', null);
        $answer->unsure = $request->input('unsure', 0);
        $save = $answer->save();

        return redirect()->route('user.soal.show', [$id, $show]);

    }

    public function end($id)
    {
        $takepacket = TakePacket::where('user_id', Auth::id())->where('packet_id', $id)->first();
        $takepacket->finished = 1;
        $takepacket->save();

        $log = new Log;
        $log->user_id = Auth::id();
        $log->target_id = Auth::id();
        $log->event = 'Selesai mengerjakan ' . Packet::find($id)->name;
        $log->type = 2;
        $log->save();

        $info = "Terima kasih telah mengerjakan soal";
        Session::flash('success', $info);
        // return redirect()->route('user.index');
        return view('user.soal.saran', compact('id'));
    }

    public function saran(Request $request, $id)
    {
        $takepacket = TakePacket::where('user_id', Auth::id())->where('packet_id', $id)->first();
        $takepacket->saran = $request->saran;
        $takepacket->save();

        $log = new Log;
        $log->user_id = Auth::id();
        $log->target_id = Auth::id();
        $log->event = 'Memberi saran ' . Packet::find($id)->name;
        $log->type = 2;
        $log->save();

        $info = "Terima kasih telah memberi saran";
        Session::flash('success', $info);
        return redirect()->route('user.index');
    }
}
