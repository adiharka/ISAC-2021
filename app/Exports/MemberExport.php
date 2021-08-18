<?php

namespace App\Exports;

use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $members = Member::get();
        return view('admin.member.excel', compact('members'));
    }
}
