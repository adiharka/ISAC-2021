<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Validator;
use Session;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index() {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $members = Member::where('user_id', $id)->get();
        return view('user.account.index', compact('user', 'members', 'id'));
    }

    public function showChangePass() {
        return view('user.account.password');
    }

    public function changePass(Request $request) {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        dd('Password change successfully.');
    }
}
