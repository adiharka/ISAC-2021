<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Auth;
use Session;

class TeamController extends Controller
{
    public function teamlist()
    {
        $team = User::where('role', '!=', 'admin')->get();
        return view('admin.team.index', compact('team'));
    }

    public function olimpiade()
    {
        $team = User::where('role', 'olim')->get();
        return view('admin.team.olimpiade', compact('team'));
    }

    public function poster()
    {
        $team = User::where('role', 'poster')->get();
        return view('admin.team.poster', compact('team'));
    }

    public function detail($id)
    {
        $status = User::where('id', $id)->exists();
        if ($status) {
            // user found
            $team = User::find($id);
            $members = Member::where('user_id', $id)->get();
            foreach ($members as $value) {
                $value = Arr::add($value, 'photoID', 'https://drive.google.com/thumbnail?id=' . Str::between($value->student_photo, '/d/', '/'));
            }
            $logs = Log::where('target_id', $id)->get();
            return view('admin.team.show', compact('status', 'team', 'members', 'logs'));
        } else {
            return view('admin.team.show', compact('status', 'id'));
        }
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
