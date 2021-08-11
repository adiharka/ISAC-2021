<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Log;
use App\Models\Packet;
use App\Models\TakePacket;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Auth;
use Session;

class TeamController extends Controller
{
    public function teamlist()
    {
        $team = User::where('role', '!=', 'admin')->get();
        $packets = Packet::get();
        return view('admin.team.index', compact('team', 'packets'));
    }

    public function olimpiade()
    {
        $team = User::where('role', 'olim')->get();
        $packets = Packet::get();
        return view('admin.team.olimpiade', compact('team', 'packets'));
    }

    public function poster()
    {
        $team = User::where('role', 'poster')->get();
        $packets = Packet::get();
        return view('admin.team.poster', compact('team', 'packets'));
    }

    public function detail($id)
    {
        $packets = Packet::get();
        $status = User::where('id', $id)->exists();
        if ($status) {
            // user found
            $team = User::find($id);
            $takepackets = TakePacket::where('user_id', $id)->get();
            $members = Member::where('user_id', $id)->get();
            foreach ($members as $value) {
                if (isset($value->student_photo)) {
                    # code...
                    $value = Arr::add($value, 'photoID', 'https://drive.google.com/thumbnail?id=' . Str::between($value->student_photo, '/d/', '/'));
                }
                else {
                    # code...
                }
            }
            $logs = Log::where('target_id', $id)->get();
            return view('admin.team.show', compact('status', 'team', 'members', 'logs', 'packets', 'takepackets'));
        } else {
            return view('admin.team.show', compact('status', 'id', 'packets'));
        }
    }

    public function showOlim($id)
    {
        $packets = Packet::get();
        $takepacket = TakePacket::find($id);
        $user = User::find($takepacket->user_id);
        $answers = Answer::where('user_id', $takepacket->user_id)->where('packet_id', $takepacket->packet_id)->orderBy('question_id', 'asc')->get();
        return view('admin.team.olimpiade.show', compact('takepacket', 'answers', 'packets', 'user'));
    }

    public function verifikasi($id)
    {
        $tim = User::find($id);
        $tim->verified = 1;
        $save = $tim->save();

        $log = new Log;
        $log->user_id = Auth::id();
        $log->target_id = $tim->id;
        $log->event = 'Sukses Memverifikasi';
        $log->type = 1;
        $log->save();

        if ($save) {
            Session::flash('success', 'Berhasil memverifikasi!');
            return redirect()->route('teamdetail', $id);
        } else {
            Session::flash('errors', ['' => 'Gagal memverifikasi, mohon coba lagi']);
            return redirect()->route('teamdetail', $id);
        }

    }
}
