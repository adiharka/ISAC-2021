<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;

class PosterController extends Controller
{
    public function edit(Request $request)
    {
        $request->validate([
            'posterLink' => 'required',
        ]);

        $deadline = Carbon::createFromFormat('d/m/Y H:i:s', '19/09/2021 23:59:00');
        if (Carbon::now() <= $deadline) {
            $user = Auth::user();
            $user->poster_link = $request->posterLink;
            $user->save();

            $log = new Log;
            $log->user_id = Auth::id();
            $log->target_id = Auth::id();
            $log->event = 'Sukses update link poster ';
            $log->type = 2;
            $log->save();
            Session::flash('success','Berhasil update link poster');
        }
        else {
            Session::flash('errors', ['' => 'Gagal update link poster', '' => $deadline]);
        }

        return redirect()->route('user.index');
    }
}
