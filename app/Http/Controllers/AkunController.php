<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\Log;
use Auth;
use Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tim = Auth::user();
        $members = Member::where('user_id', Auth::id())->get();
        foreach ($members as $value) {
            $value = Arr::add($value, 'photoID', 'https://drive.google.com/thumbnail?id=' . Str::between($value->student_photo, '/d/', '/'));
        }
        return view('user.akun.index', compact('members', 'tim'));
    }

    public function pass()
    {
        return view('user.akun.password');
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        $log = new Log;
        $log->user_id = Auth::id();
        $log->target_id = Auth::id();
        $log->event = 'Sukses mengganti password ';
        $log->type = 2;
        $log->save();

        return redirect()->route('user.akun.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $member = Member::where('user_id', Auth::id())->skip($id)->first();

        // return view('user.akun.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'borndate' => 'required',
            'photolink' => 'required',
            'line' => 'required',
            'whatsapp' => 'required',
            'student_card' => 'required',
        ]);

        $member = Member::where('user_id', Auth::id())->skip($request->id)->first();
        $member->borndate = $request->borndate;
        $member->student_photo = $request->photolink;
        $member->line = $request->line;
        $member->whatsapp = $request->whatsapp;
        $member->student_card = $request->student_card;

        if (!$member->profil_lengkap) {
            $tim = Auth::user();
            $tim->profil_lengkap += 1;
            $tim->save();
        };

        $member->profil_lengkap = 1;
        $save = $member->save();

        $log = new Log;
        $log->user_id = Auth::id();
        $log->target_id = Auth::id();
        $log->event = 'Sukses update profil ' . $member->name;
        $log->type = 1;
        $log->save();

        if ($save) {
            Session::flash('success', 'Sukses mengupdate info');
            return redirect()->route('user.akun.index');
        } else {
            Session::flash('errors', ['' => 'Gagal!']);
            return back();
        }
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'payment_photo' => 'required',
        ]);

        $tim = Auth::user();
        $tim->payment_photo = $request->payment_photo;
        $save = $tim->save();

        $log = new Log;
        $log->user_id = Auth::id();
        $log->target_id = Auth::id();
        $log->event = 'Sukses mengirim bukti transfer';
        $log->type = 1;
        $log->save();

        if ($save) {
            Session::flash('success', 'Sukses mengirim bukti transfer');
            return redirect()->route('user.index');
        } else {
            Session::flash('errors', ['' => 'Gagal!']);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
