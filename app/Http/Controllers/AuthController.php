<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Member;
use App\Models\Log;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            //Login Success
            return redirect()->route('user.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check() && Auth::user()->role == 'admin') { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        } elseif (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('user.index');
        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // User
        $rules = [
            'lomba'                 => 'required',
            'school'                => 'required',
            'school_province'       => 'required',
            'school_city'           => 'required',
            'teamname'              => 'required|min:1|max:35|unique:users,teamname',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'name'                  => 'required'
        ];

        $messages = [
            'lomba.required'        => 'Lomba yang diikuti wajib diisi',
            'school.required'       => 'Asal Sekolah wajib diisi',
            'school_province.required' => 'Provinsi Sekolah wajib diisi',
            'school_city.required'  => 'Kabupaten Sekolah wajib diisi',
            'teamname.required'     => 'Nama tim wajib diisi',
            'teamname.unique'       => 'Nama tim sudah terpakai',
            'teamname.min'          => 'Nama tim minimal 1 karakter',
            'teamname.max'          => 'Nama tim maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terpakai',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'name.required'         => 'Nama ketua wajib diisi',
        ];

        $validator1 = Validator::make($request->all(), $rules, $messages);

        if ($validator1->fails()) {
            return redirect()->back()->withErrors($validator1)->withInput($request->all);
        }

        // -------------------- Anggota 1 --------------------
        $rules = [
            'name'                  => 'required|min:1|max:35',
        ];

        $messages = [
            'name.required'         => 'Nama lengkap ketua wajib diisi',
            'name.min'              => 'Nama lengkap ketua minimal 1 karakter',
            'name.max'              => 'Nama lengkap ketua maksimal 35 karakter',
        ];

        $validator2 = Validator::make($request->all(), $rules, $messages);

        if ($validator2->fails()) {
            return redirect()->back()->withErrors($validator2)->withInput($request->all);
        }

        // -------------------- Anggota 2 --------------------
        $anggota2 = 0;
        if ($request->filled('name2')) {
            $rules = [
                'name2'                  => 'required|min:1|max:35',
            ];

            $messages = [
                'name2.required'         => 'Nama lengkap anggota 2 wajib diisi (hapus kolom anggota 2 jika memang tidak ada)',
                'name2.min'              => 'Nama lengkap anggota 2 minimal 1 karakter',
                'name2.max'              => 'Nama lengkap anggota 2 maksimal 35 karakter',
            ];

            $validator3 = Validator::make($request->all(), $rules, $messages);

            if ($validator3->fails()) {
                return redirect()->back()->withErrors($validator3)->withInput($request->all);
            }
            $anggota2 = 1;
        }

        // -------------------- Anggota 3 --------------------
        $anggota3 = 0;
        if ($request->filled('name3')) {
            $rules = [
                'name3'                  => 'required|min:1|max:35',
            ];

            $messages = [
                'name3.required'         => 'Nama lengkap anggota 3 wajib diisi (hapus kolom anggota 3 jika memang tidak ada)',
                'name3.min'              => 'Nama lengkap anggota 3 minimal 1 karakter',
                'name3.max'              => 'Nama lengkap anggota 3 maksimal 35 karakter',
            ];

            $validator4 = Validator::make($request->all(), $rules, $messages);

            if ($validator4->fails()) {
                return redirect()->back()->withErrors($validator4)->withInput($request->all);
            }

            $anggota3 = 1;
        }

        // Save the data

        $user = new User;
        $user->teamname = ($request->teamname);
        $user->school = ($request->school);
        $user->school_province = ucwords(strtolower($request->school_province));
        $user->school_city = ($request->school_city);
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->active = 1;
        $user->role = $request->lomba;
        // $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->target_id = $user->id;
        $log->event = 'Sukses membuat akun';
        $log->type = 1;
        $simpan4 = $log->save();

        $member = new Member;
        $member->user_id = ($user->id);
        $member->leader = (1);
        $member->name = ($request->name);
        $simpan1 = $member->save();

        $simpan2 = 1;
        $simpan3 = 1;

        if ($anggota2) {
            $member = new Member;
            $member->user_id = ($user->id);
            $member->leader = (0);
            $member->name = ($request->name2);
            $simpan2 = $member->save();
        }

        if ($anggota3) {
            $member = new Member;
            $member->user_id = ($user->id);
            $member->leader = (0);
            $member->name = ($request->name3);
            $simpan3 = $member->save();
        }

        if ($simpan && $simpan1 && $simpan2 && $simpan3 && $simpan4) {
            Session::flash('success', 'Register berhasil! Jangan lupa untuk melengkapi informasi peserta setelah login!');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('index');
    }
}
