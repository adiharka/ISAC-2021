<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class MemberController extends Controller
{
    public function memberlist()
    {
        $member = Member::get();
        return view('admin.member.index', compact('member'));
    }

    public function olimpiade()
    {
        $tim = User::where('role', 'olim')->get();
        $member = Member::get()->user->where('role', 'olim')->get();
        return view('admin.member.olimpiade', compact('member'));
    }

    public function poster()
    {
        $member = User::where('role', 'poster')->member->get();
        return view('admin.member.poster', compact('member'));
    }

}
