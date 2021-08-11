<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Member;
use App\Models\Packet;
use App\Models\TakePacket;
use Session;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $members = Member::where('user_id', Auth::id())->get();
        if ($members->count() == Auth::user()->profil_lengkap) {
            $lengkap = 1;
        } else {
            $lengkap = 0;
        }
        if(Auth::user()->payment_photo == null){
            $bayar = 1;
        } else {
            $bayar = 0;
        }

        // OLIM
        $attempt = TakePacket::where('user_id', Auth::id())->get();
        $plucked = $attempt->pluck('packet_id');
        $packets = Packet::whereNotIn('id', $plucked->all())->get();
        $ongoings = TakePacket::where('user_id', Auth::id())->where('finished', 0)->get();
        $finishedpackets = TakePacket::where('user_id', Auth::id())->where('finished', 1)->get();

        return view('user.index', compact('members', 'lengkap', 'bayar', 'packets', 'ongoings', 'finishedpackets'));
    }
}
