<?php

namespace App\Http\Controllers;

use App\Models\Modelhome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class Home extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $dataLogin = Modelhome::sortable()
                ->where('tb_login.nama_lengkap', 'LIKE', '%' . $cari . '%')
                ->orWhere('tb_login.dept', 'LIKE', '%' . $cari . '%')->paginate(10)->onEachSide(2)->fragment('tb_login');
        } else {
            $dataLogin = Modelhome::sortable()->paginate(10)->onEachSide(2)->fragment('tb_login');
        }

        // $data = [
        //     'dataLogin' => Modelhome::sortable()->paginate(10)->onEachSide(2)->fragment('dataLogin'),
        // ];
        return View('ho.data')->with([
            'dataLogin' => $dataLogin,
            'cari'      => $cari,
        ]);
    }
    public function datasoft()
    {
        $data = [
            'dataLogin' => Modelhome::onlyTrashed()->get()
        ];
        return View('ho.datasoft', $data);
    }

    public function add()
    {
        return View('ho.formtambah');
    }

    public function save(Request $r)
    {

        $id             = $r->id;
        $dept           = $r->dept;
        $cabang         = $r->cabang;
        $nama_lengkap   = $r->nama_lengkap;

        $validateData = $r->validate(
            [
                'dept'      =>  'required',
                'cabang'    =>  'required',
                'nama_lengkap' => 'required|unique:tb_login,nama_lengkap',
                'foto'      => 'mimes:jpg,png,jpeg,jfif|image|max:2048',
            ],
            [
                'dept.required' => 'Kolom Departemen Tidak Boleh Kosong',
                'cabang.required' => 'Kolom Cabang Tidak Boleh Kosong',
                'nama_lengkap.required' => 'Nama Lengkap Tidak Boleh Kosong',
                'nama_lengkap.unique' => 'Nama Anda Sudah Terdaftar di Sistem',
                'foto.mimes' => 'File hanya dapat berupa Gambar (JPG, JPEG, PNG, JFIF)',
                'foto.max' => 'File Tidak Boleh Lebih dari 2MB',
            ]
        );

        if ($r->hasFile('foto')) {
            $path = $r->file('foto')->storeAs('uploads', time() . '-' . strtok($nama_lengkap, " ") . '-' . $id . '.' . $r->file('foto')->extension());
        } else {
            $path = '';
        }

        $login          = new Modelhome;
        $login->dept = $dept;
        $login->cabang = $cabang;
        $login->nama_lengkap = $nama_lengkap;
        $login->foto = $path;
        $login->save();

        // echo 'Data berhasil Tersimpan';
        $r->session()->flash('msg', "Data Login User $nama_lengkap berhasil disimpan");
        return redirect('/home/tambah');
    }

    public function edit($id)
    {
        $login = Modelhome::find($id);
        $data = [
            'id' => $id,
            'dept' => $login->dept,
            'cabang' => $login->cabang,
            'nama_lengkap' => $login->nama_lengkap,
            'foto' => $login->foto,
        ];


        return View('ho.edit', $data);
    }

    public function update(Request $r)
    {
        $id             = $r->id;
        $dept           = $r->dept;
        $cabang         = $r->cabang;
        $nama_lengkap   = $r->nama_lengkap;

        $validateData = $r->validate(
            [
                'foto'      => 'mimes:jpg,png,jpeg,jfif|image|max:2048',
            ],
            [
                'foto.mimes' => 'File hanya dapat berupa Gambar (JPG, JPEG, PNG, JFIF)',
                'foto.max' => 'File Tidak Boleh Lebih dari 2MB',
            ]
        );

        if ($r->hasFile('foto')) {
            $path = $r->file('foto')->storeAs('uploads', time() . '-' . strtok($nama_lengkap, " ") . '-' . $id . '.' . $r->file('foto')->extension());
        } else {
            $path = '';
        }


        $login      = Modelhome::find($id);
        $pathFoto   = $login->foto;

        if ($pathFoto != NULL || $pathFoto != '') {
            Storage::delete($pathFoto);
        }

        $login->dept = $dept;
        $login->cabang = $cabang;
        $login->nama_lengkap = $nama_lengkap;
        $login->foto = $path;
        $login->save();

        // echo 'Data berhasil Tersimpan';
        $r->session()->flash('msg', "Data Login User $nama_lengkap berhasil Diubah");
        return redirect('/home/index');
    }

    public function hapus($id)
    {
        Modelhome::find($id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Modelhome::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $ho = Modelhome::withTrashed()->find($id);
        $pathFoto = $ho->foto;

        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
        }

        Modelhome::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}
