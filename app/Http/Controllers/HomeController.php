<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Member;
use Session;
use Auth;

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

        return view('user.index', compact('members', 'lengkap', 'bayar'));
    }
}
