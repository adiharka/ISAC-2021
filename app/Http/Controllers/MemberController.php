<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Log;
use App\Models\Packet;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    public function memberlist()
    {
        $packets = Packet::get();
        $member = Member::get();

        $olim = User::where('role', 'olim')->withCount('member')->get();
        $olimtotal = 0;
        foreach ($olim as $post) {
            $olimtotal += $post->member_count;
        }
        $poster = User::where('role', 'poster')->withCount('member')->get();
        $postertotal = 0;
        foreach ($poster as $post) {
            $postertotal += $post->member_count;
        }

        return view('admin.member.index', compact('member', 'packets', 'olimtotal', 'postertotal'));
    }

    public function olimpiade()
    {
        $packets = Packet::get();
        $tim = User::where('role', 'olim')->get();
        $member = Member::get()->user->where('role', 'olim')->get();
        return view('admin.member.olimpiade', compact('member', 'packets'));
    }

    public function poster()
    {
        $packets = Packet::get();
        $member = User::where('role', 'poster')->member->get();
        return view('admin.member.poster', compact('member', 'packets'));
    }

    public function excel()
	{
		return Excel::download(new MemberExport(), "Peserta ISAC 2021.xlsx");
	}
}
