<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelkomunikasi;
use App\Models\Modelcabang;
use App\Models\Modeldept;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Komunikasi extends Controller
{
    public function home()
    {
        $cabang = Auth::User()->cabang;
        $data = [
            'dataUtama' => Modelkomunikasi::all()
                ->where('cabang', "$cabang")
        ];
        return View('komunikasi.home', $data);
    }

    public function addinternal()
    {
        $cabang = Auth::User()->cabang;
        $cbg = cabang();
        $dept = Auth::User()->dept;
        $datenow = date('y', time()) . (date('m', time()));
        $data = [
            'dataUtama' => Modelkomunikasi::all()
                ->where('cabang', "$cabang"),
            'dataCabang' => Modelcabang::all()->where('id', '=', "$cabang"),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataUser' => User::all()->where('cabang', '=', "$cabang")->sortBy('nama_lengkap'),
            'monthnow' => date('m', time()),
            'yearnow' => date('Y', time()),
        ];
        return View('komunikasi.addinternal', $data);
    }

    public function addeksternal()
    {
        $cabang = Auth::User()->cabang;
        $cbg = cabang();
        $dept = Auth::User()->dept;
        $datenow = date('y', time()) . (date('m', time()));
        $data = [
            'dataUtama' => Modelkomunikasi::all()
                ->where('cabang', "$cabang"),
            'dataCabang' => Modelcabang::all(),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataUser' => User::all()->sortBy('nama_lengkap'),
            'monthnow' => date('m', time()),
            'yearnow' => date('Y', time()),
        ];
        return View('komunikasi.addeksternal', $data);
    }


    public function addkomint_action(Request $request)
    {
        $cabang = cabang();
        $dept = $request->d_dept;
        $datenow = date('y', time()) . (date('m', time()));
        $monthnow = date('m', time());
        $yearnow = date('Y', time());
        $idlogin = Auth::user()->id;
        $userlogin = Auth::user()->nama_lengkap;
        $request->validate(
            [
                'd_dept'        =>  'required',
                'hal'           =>  'required',
                'k_cabang'      =>  'required',
                'k_dept'        =>  'required',
                'deskripsi'     =>  'required',
                'deskripsi2'    =>  'required',
                'waktu'         =>  'required',
                'darijam'       =>  'required',
                'sampaijam'     =>  'required',
                'tempat'        =>  'required',
            ],
            [
                'd_dept.required'       =>  'Departemen Pembuat Komunikasi Tidak Boleh Kosong',
                'hal.required'          =>  'Hal Tidak Boleh Kosong',
                'k_cabang.required'     =>  'Silahkan Pilih Minimal 1 Cabang',
                'k_dept.required'       =>  'Silahkan Pilih Minimal 1 Departemen',
                'deskripsi.required'    =>  'Deskripsi Tidak Boleh Kosong',
                'deskripsi2.required'   =>  'Deskripsi Tidak Boleh Kosong',
                'waktu.required'        =>  'Hari / Tanggal Tidak Boleh Kosong',
                'darijam.required'      =>  'Dari Jam Tidak Boleh Kosong',
                'sampaijam.required'    =>  'Sampai Jam Tidak Boleh Kosong',
                'tempat.required'       =>  'Tempat Tidak Boleh Kosong',
            ]
        );
        if ($request->kepada != '') {
            $kepada     = implode(',', $request->kepada);
        } else {
            $kepada = '-';
        }
        $k_cabang   = implode(',', $request->k_cabang);
        $k_dept     = implode(',', $request->k_dept);

        $kodemax = [
            'kodeMax' => Modelkomunikasi::all()
                ->where('bulan', "$datenow")
                ->where('d_cabang', "$cabang")
                ->where('d_dept', "$dept")
                ->where('jenis', '0')
                ->max('nomor')
        ];
        $kodeMax = max($kodemax);
        if (isset($kodeMax)) {
            $nilaikode = substr($kodeMax, 0, 3);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $beda = (int) $nilaikode + 1;
            $kodeMaxp = str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $kodeMaxp = '001';
        }
        $hasilkode = $kodeMaxp . '/KOM/' . $cabang . '/' . $dept . '/' . tgl_id($monthnow) . '/' . $yearnow;

        $utama = new Modelkomunikasi([

            'nomor'         =>  $hasilkode,
            'tgl'           =>  $request->tgl,
            'bulan'         =>  $request->bulan,
            'dari'          =>  $request->dari,
            'd_cabang'      =>  $request->d_cabang,
            'd_dept'        =>  $dept,
            'hal'           =>  $request->hal,
            'kepada'        =>  $kepada,
            'k_cabang'      =>  $k_cabang,
            'k_dept'        =>  $k_dept,
            'deskripsi'     =>  $request->deskripsi,
            'deskripsi2'    =>  $request->deskripsi2,
            'waktu'         =>  $request->waktu,
            'darijam'       =>  $request->darijam,
            'sampaijam'     =>  $request->sampaijam,
            'tempat'        =>  $request->tempat,
            'disetujui'     =>  0,
            'jenis'         =>  $request->jenis,
            'last_edit'     =>  $request->last_edit,
            'status'        =>  0,
        ]);
        $utama->save();

        return redirect()->route('komunikasi.home')->with('success', 'Sukses, Komunikasi Berhasil dibuat');
    }


    public function addkomeks_action(Request $request)
    {
        $dept = $request->d_dept;
        $datenow = date('y', time()) . (date('m', time()));
        $monthnow = date('m', time());
        $yearnow = date('Y', time());
        $idlogin = Auth::user()->id;
        $userlogin = Auth::user()->nama_lengkap;
        $request->validate(
            [
                'd_dept'        =>  'required',
                'hal'           =>  'required',
                'k_cabang'      =>  'required',
                'k_dept'        =>  'required',
                'deskripsi'     =>  'required',
                'deskripsi2'    =>  'required',
                'waktu'         =>  'required',
                'darijam'       =>  'required',
                'sampaijam'     =>  'required',
                'tempat'        =>  'required',
            ],
            [
                'd_dept.required'       =>  'Departemen Pembuat Komunikasi Tidak Boleh Kosong',
                'hal.required'          =>  'Hal Tidak Boleh Kosong',
                'k_cabang.required'     =>  'Silahkan Pilih Minimal 1 Cabang',
                'k_dept.required'       =>  'Silahkan Pilih Minimal 1 Departemen',
                'deskripsi.required'    =>  'Deskripsi Tidak Boleh Kosong',
                'deskripsi2.required'   =>  'Deskripsi Tidak Boleh Kosong',
                'waktu.required'        =>  'Hari / Tanggal Tidak Boleh Kosong',
                'darijam.required'      =>  'Dari Jam Tidak Boleh Kosong',
                'sampaijam.required'    =>  'Sampai Jam Tidak Boleh Kosong',
                'tempat.required'       =>  'Tempat Tidak Boleh Kosong',
            ]
        );
        if ($request->kepada != '') {
            $kepada     = implode(',', $request->kepada);
        } else {
            $kepada = '-';
        }
        $k_cabang   = implode(',', $request->k_cabang);
        $k_dept     = implode(',', $request->k_dept);

        $kodemax = [
            'kodeMax' => Modelkomunikasi::all()
                ->where('bulan', "$datenow")
                ->where('d_dept', "$dept")
                ->where('jenis', '1')
                ->max('nomor')
        ];
        $kodeMax = max($kodemax);
        if (isset($kodeMax)) {
            $nilaikode = substr($kodeMax, 0, 3);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $beda = (int) $nilaikode + 1;
            $kodeMaxp = str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $kodeMaxp = '001';
        }
        $hasilkode = $kodeMaxp . '/KOM/' . $dept . '/' . tgl_id($monthnow) . '/' . $yearnow;

        $utama = new Modelkomunikasi([

            'nomor'         =>  $hasilkode,
            'tgl'           =>  $request->tgl,
            'bulan'         =>  $request->bulan,
            'dari'          =>  $request->dari,
            'd_cabang'      =>  $request->d_cabang,
            'd_dept'        =>  $dept,
            'hal'           =>  $request->hal,
            'kepada'        =>  $kepada,
            'k_cabang'      =>  $k_cabang,
            'k_dept'        =>  $k_dept,
            'deskripsi'     =>  $request->deskripsi,
            'deskripsi2'    =>  $request->deskripsi2,
            'waktu'         =>  $request->waktu,
            'darijam'       =>  $request->darijam,
            'sampaijam'     =>  $request->sampaijam,
            'tempat'        =>  $request->tempat,
            'disetujui'     =>  0,
            'jenis'         =>  $request->jenis,
            'last_edit'     =>  $request->last_edit,
            'status'        =>  0,
        ]);
        $utama->save();

        return redirect()->route('komunikasi.home')->with('success', 'Sukses, Komunikasi Eketernal Berhasil dibuat');
    }

    public function internal()
    {
        $cabang = cabang();
        $dataUtama = [
            'MKT' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'MKT')
                ->get(),
            'PRC' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'PRC')
                ->get(),
            'PBL' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'PBL')
                ->get(),
            'GBB' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'GBB')
                ->get(),
            'PRO' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'PRO')
                ->get(),
            'ENG' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'ENG')
                ->get(),
            'QCT' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'QCT')
                ->get(),
            'GPJ' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'GPJ')
                ->get(),
            'EKS' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'EKS')
                ->get(),
            'KND' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'KND')
                ->get(),
            'FIN' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'FIN')
                ->get(),
            'ACC' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'ACC')
                ->get(),
            'HRD' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'HRD')
                ->get(),
            'SIS' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'SIS')
                ->get(),
            'EDP' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'EDP')
                ->get(),
            'TAX' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'TAX')
                ->get(),
            'GRR' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'GRR')
                ->get(),
            'RND' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'RND')
                ->get(),
            'GSP' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'GSP')
                ->get(),
            'BM' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'BM')
                ->get(),
            'CRT' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '0')
                ->where('d_dept', '=', 'CRT')
                ->get(),
        ];
        return View('komunikasi.list.internal', $dataUtama);
    }

    public function eksternal()
    {
        $cabang = cabang();
        $dataUtama = [
            'MKT' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'MKT')
                ->get(),
            'PRC' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'PRC')
                ->get(),
            'PBL' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'PBL')
                ->get(),
            'GBB' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'GBB')
                ->get(),
            'PRO' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'PRO')
                ->get(),
            'ENG' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'ENG')
                ->get(),
            'QCT' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'QCT')
                ->get(),
            'GPJ' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'GPJ')
                ->get(),
            'EKS' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'EKS')
                ->get(),
            'KND' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'KND')
                ->get(),
            'FIN' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'FIN')
                ->get(),
            'ACC' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'ACC')
                ->get(),
            'HRD' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'HRD')
                ->get(),
            'SIS' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'SIS')
                ->get(),
            'EDP' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'EDP')
                ->get(),
            'TAX' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'TAX')
                ->get(),
            'GRR' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'GRR')
                ->get(),
            'RND' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'RND')
                ->get(),
            'GSP' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'GSP')
                ->get(),
            'BM' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'BM')
                ->get(),
            'CRT' => Modelkomunikasi::where('d_cabang', '=', $cabang)
                ->where('jenis', '1')
                ->where('d_dept', '=', 'CRT')
                ->get(),
        ];
        return View('komunikasi.list.eksternal', $dataUtama);
    }
}
