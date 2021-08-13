<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Packet;
use App\Models\User;
use Illuminate\Http\Request;

use App\Exports\PosterExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminPosterController extends Controller
{
    public function index() {
        $packets = Packet::get();
        $soals = Question::get();
        $teams = User::where('role', 'poster')->get();
        $count = User::where('role', 'poster')->where('poster_link', '!=', '')->count();
        return view('admin.poster.index', compact('teams', 'packets', 'soals', 'count'));
    }

    public function excel()
	{
		return Excel::download(new PosterExport(), 'ISAC Poster.xlsx');
	}
}
