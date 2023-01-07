<?php

namespace App\Http\Controllers;

use App\Models\Modelakses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title']  =   'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'dept'                  =>  'required',
            'cabang'                =>  'required',
            'nama_lengkap'          =>  'required',
            'email'                 =>  'required|unique:tb_login',
            'password'              =>  'required',
            'password_confirmation' =>  'required|same:password',
            'no_telegram'           =>  'required|numeric',
            'no_wa'                 =>  'required|numeric',
        ]);
        if ($request->cabang == 'HO') {
            $level = 'ho';
        } else {
            $level = 'cabang';
        }
        $user = new User([
            'dept'                  =>  $request->dept,
            'cabang'                =>  $request->cabang,
            'level'                 =>  $level,
            'nama_lengkap'          =>  $request->nama_lengkap,
            'email'                 =>  $request->email,
            'password'              =>  Hash::make($request->password),
            'spassword'             =>  $request->password,
            'no_telegram'           =>  $request->no_telegram,
            'no_wa'                 =>  $request->no_wa,
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Regristrasi Berhasil.');
    }

    public function login()
    {
        $data['title']  =   'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {

        $email = $request->email;
        $request->validate(
            [
                'email'                 =>  'required',
                'password'              =>  'required',
            ],
            [
                'email.required'        =>  'Email Tidak Boleh Kosong',
                'password.required'     =>  'Password Tidak Boleh Kosong',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $cariid = User::where('email', '=', "$email")->get()->first();
            $id = $cariid->id;
            $akses = Modelakses::where('id', '=', "$id")->get()->first();
            $MKT = $akses->MKT;
            $PRC = $akses->PRC;
            $PBL = $akses->PBL;
            $GBB = $akses->GBB;
            $PRO = $akses->PRO;
            $ENG = $akses->ENG;
            $QCT = $akses->QCT;
            $GPJ = $akses->GPJ;
            $EKS = $akses->EKS;
            $KND = $akses->KND;
            $FIN = $akses->FIN;
            $ACC = $akses->ACC;
            $HRD = $akses->HRD;
            $SIS = $akses->SIS;
            $EDP = $akses->EDP;
            $TAX = $akses->TAX;
            $GRR = $akses->GRR;
            $RND = $akses->RND;
            $GSP = $akses->GSP;
            $BM = $akses->BM;
            $CRT = $akses->CRT;
            if ($FIN == 1) {
                return redirect()->intended('/');
            } elseif ($HRD == 1 || $PBL == 1 || $EDP == 1) {
                return redirect()->intended('/wodesain');
            } else {
                return redirect()->intended('/');
            }
        }
        return back()->withErrors('password')->with('failed', 'Email atau Password Salah !!');
    }

    public function password()
    {
        $data['title']  =   'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password'          =>  'required|current_password',
            'new_password'          =>  'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->spassword = $request->new_password;
        $user->save();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Password Telah Berhasil diganti');
    }

    public function user_profile()
    {
        return view('ho.user_profile');
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::id());
        $validateData = $request->validate(
            [
                'foto'      => 'mimes:jpg,png,jpeg,jfif|image|max:2048',
            ],
            [
                'foto.mimes' => 'File hanya dapat berupa Gambar (JPG, JPEG, PNG, JFIF)',
                'foto.max' => 'File Tidak Boleh Lebih dari 2MB',
            ]
        );


        if ($request->hasFile('foto')) {
            $time = time();
            $request->file('foto')->storeAs('uploads/img-usr', $time . '-' . strtok($request->nama_lengkap, " ") . '-' . $user->id . '.' . $request->file('foto')->extension());
            $path = $time . '-' . strtok($request->nama_lengkap, " ") . '-' . $user->id . '.' . $request->file('foto')->extension();
        } else {
            $path = $request->default;
        }


        $user->nama_lengkap = $request->nama_lengkap;
        $user->gender       = $request->gender;
        $split = explode('/', $request->birth_date);
        $hasil_tgl = $split[2] . '-' . $split[0] . '-' . $split[1];
        $user->birth_date   = $hasil_tgl;
        $user->marital      = $request->marital;
        $user->no_wa        = $request->no_wa;
        $user->twitter      = $request->twitter;
        $user->instagram    = $request->instagram;
        $user->foto         = $path;
        $user->save();
        return redirect()->route('user_profile')->with('success', 'Sukses, Informasi Pribadi Telah Berhasil Diperbaharui.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
