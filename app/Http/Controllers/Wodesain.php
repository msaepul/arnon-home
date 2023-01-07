<?php

namespace App\Http\Controllers;

use App\Models\Masterdesain;
use Illuminate\Http\Request;
use App\Models\Modelcabang;
use App\Models\Modeldept;
use App\Models\Modelkategori;
use App\Models\Modelroti;
use App\Models\Wodesainutama;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Wodesain extends Controller
{
    public function home()
    {
        $cabang = Auth::user()->cabang;
        $data = [
            'dataUtama' => Wodesainutama::all(),
            'masterdesain' => Masterdesain::where('masterdesain', '=', '-')
                ->where('id_cabang', '=', "$cabang")
                ->count(),
            'mk' => Wodesainutama::where('cabang', '=', "$cabang")
                ->where('status', '=', '0')
                ->count(),
            'sd' => Wodesainutama::where('cabang', '=', "$cabang")
                ->where('status', '=', '1')
                ->count(),
            'pv' => Wodesainutama::where('cabang', '=', "$cabang")
                ->where('status', '=', '2')
                ->count(),
            'sl' => Wodesainutama::where('cabang', '=', "$cabang")
                ->where('status', '=', '3')
                ->count(),
            'pd' => Wodesainutama::where('cabang', '=', "$cabang")
                ->where('status', '=', '4')
                ->count(),
            'dt' => Wodesainutama::where('cabang', '=', "$cabang")
                ->where('status', '=', '5')
                ->count(),
            'tl' => Wodesainutama::where('cabang', '=', "$cabang")
                ->count(),

        ];
        return View('wodesain.home', $data);
    }

    public function add()
    {
        $idcabang = Auth::user()->cabang;
        $cabang = cabang();
        $datenow = date('y', time()) . (date('m', time()));
        $kodemax = [
            'kodeMax' => Wodesainutama::all()
                ->where('bulan', "$datenow")
                ->where('jenis', '0')
                ->max('nomor')
        ];
        $bulan = date('F');
        $monthnow = date('m', time());
        $yearnow = date('y', time());
        $kodeMax = max($kodemax);
        if (isset($kodeMax)) {
            $nilaikode = substr($kodeMax, -3, 3);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $beda = (int) $nilaikode + 1;
            $kodeMaxp = str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $kodeMaxp = '001';
        }
        $hasilkode = 'WO-0-' . $monthnow . '-' . $yearnow . '-' . $kodeMaxp;
        $data = [
            'dataUtama' => Wodesainutama::all(),
            'paroti' => Modelroti::all()->where('id_merek', "1"),
            'arnon' => Modelroti::all()->where('id_merek', "2"),
            'jordan' => Modelroti::all()->where('id_merek', "3"),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataCabang' => Modelcabang::all(),
            'masterdesain' => Masterdesain::where('masterdesain', '=', '-')
                ->where('id_cabang', '=', "$idcabang")
                ->count(),

        ];
        return View('wodesain.add', $data)->with(['hasilkode' => $hasilkode]);
    }

    public function addukuran()
    {
        $idcabang = Auth::user()->cabang;
        $cabang = cabang();
        $datenow = date('y', time()) . (date('m', time()));
        $kodemax = [
            'kodeMax' => Wodesainutama::all()
                ->where('bulan', "$datenow")
                ->where('jenis', '1')
                ->max('nomor')
        ];
        $bulan = date('F');
        $monthnow = date('m', time());
        $yearnow = date('y', time());
        $kodeMax = max($kodemax);
        if (isset($kodeMax)) {
            $nilaikode = substr($kodeMax, -3, 3);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $beda = (int) $nilaikode + 1;
            $kodeMaxp = str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $kodeMaxp = '001';
        }
        $hasilkode = 'WO-1-' . $monthnow . '-' . $yearnow . '-' . $kodeMaxp;
        $data = [
            'dataUtama' => Wodesainutama::all(),
            'paroti' => Modelroti::all()->where('id_merek', "1"),
            'arnon' => Modelroti::all()->where('id_merek', "2"),
            'jordan' => Modelroti::all()->where('id_merek', "3"),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataCabang' => Modelcabang::all(),
            'masterdesain' => Masterdesain::where('masterdesain', '=', '-')
                ->where('id_cabang', '=', "$idcabang")
                ->count(),

        ];
        return View('wodesain.addukuran', $data)->with(['hasilkode' => $hasilkode]);
    }

    public function addwo_action(Request $request)
    {
        $idlogin = Auth::user()->id;
        $userlogin = Auth::user()->nama_lengkap;
        $request->validate(
            [
                'nomor'         =>  'required|unique:tb_wodesain',
                'jenis'         =>  'required',
                'bulan'         =>  'required',
                'cabang'        =>  'required',
                'merek'         =>  'required',
                'produk'        =>  'required',
                'izinedar'      =>  'required',
                'mui'           =>  'required',
                'ukuran'        =>  'required',
                'komunikasi'    =>  'required',
                'deskripsi'     =>  'required',
                'lampiran1'     =>  'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg|max:2048',
            ],
            [
                'nomor.required'         =>  'nomor Tidak Boleh Kosong',
                'jenis.required'         =>  'Jenis WO Tidak Boleh Kosong',
                'bulan.required'         =>  'Tanggal WO Tidak Boleh Kosong',
                'cabang.required'        =>  'Nama Cabang Tidak Boleh Kosong',
                'merek.required'         =>  'Merek Roti Tidak Boleh Kosong',
                'produk.required'        =>  'Produk Tidak Boleh Kosong',
                'izinedar.required'      =>  'Nomor BPOM / PIRT Tidak Boleh Kosong',
                'mui.required'           =>  'Nomor MUI Tidak Boleh Kosong',
                'ukuran.required'        =>  'Detail Ukuran Baru Tidak Boleh Kosong',
                'komunikasi.required'    =>  'Mohon Pilih Referensi Nomor Komunikasi',
                'deskripsi.required'     =>  'Mohon Masukan Deskripsi Dengan Jelas',
                'lampiran1.mimes'        => 'Tipe File yang anda Upload tidak diizinkan !!',
                'lampiran1.max'          => 'File Tidak Boleh Lebih dari 2MB',
            ]
        );

        if ($request->jenis == 0) {
            $jeniswo = "perubahan_desain";
        } elseif ($request->jenis == 1) {
            $jeniswo = "perubahan_ukuran";
        } else {
            $jeniswo = "desain_baru";
        }
        if ($request->hasFile('lampiran1')) {
            $time = time();
            $request->file('lampiran1')->storeAs('uploads/wo/' . $jeniswo . '/', $time . ' QRCODE BPOM ' . cabang() . ' ' . $request->produk . '.' . $request->file('lampiran1')->extension());
            $path1 = $time . ' QRCODE BPOM ' . cabang() . ' ' . $request->produk . '.' . $request->file('lampiran1')->extension();
        } else {
            $path1 = '-';
        }

        $utama = new Wodesainutama([

            'nomor'         =>  $request->nomor,
            'jenis'         =>  $request->jenis,
            'bulan'         =>  $request->bulan,
            'tgl'           =>  $request->tgl,
            'cabang'        =>  $request->cabang,
            'merek'         =>  $request->merek,
            'produk'        =>  substr($request->produk, 2, 2),
            'izinedar'      =>  $request->izinedar,
            'mui'           =>  $request->mui,
            'ukuran'        =>  $request->ukuran,
            'komunikasi'    =>  $request->komunikasi,
            'deskripsi'     =>  $request->deskripsi,
            'status'        =>  0,
            'last_edit'     =>  $request->last_edit,
            'lampiran1'     =>  $path1,
        ]);
        $utama->save();
        require_once __DIR__ . '/status/dari.php';

        return redirect()->route('wodesain.home')->with('success', 'Sukses, WO ' . $jeniswo . ' Berhasil dibuat');
    }

    public function masterdesain()
    {
        $cabang = cabang();
        $data = [
            'dataWoall' =>  Masterdesain::select(
                "tb_masterdesain.*",
                "tb_roti.produk as namaproduk",
                "tb_roti.merek",
                "tb_roti.kode",
                "tb_cabang.cabang"
            )
                ->join("tb_roti", "tb_roti.id", "=", "tb_masterdesain.id_produk")
                ->join("tb_cabang", "tb_cabang.id", "=", "tb_masterdesain.id_cabang")
                ->where("cabang", "=", "$cabang")
                ->orderby("masterdesain", "desc")
                ->orderby("id", "asc")
                ->get()
        ];
        return View('wodesain.masterdesain.masterdesain', $data);
    }
    public function masterdesainhapus()
    {
        $cabang = cabang();
        $data = [
            'dataWoall' =>  Masterdesain::select(
                "tb_masterdesain.*",
                "tb_roti.produk as namaproduk",
                "tb_roti.merek",
                "tb_roti.kode",
                "tb_cabang.cabang"
            )
                ->join("tb_roti", "tb_roti.id", "=", "tb_masterdesain.id_produk")
                ->join("tb_cabang", "tb_cabang.id", "=", "tb_masterdesain.id_cabang")
                ->where("cabang", "=", "$cabang")
                ->onlyTrashed()->get()
        ];
        return View('wodesain.masterdesain.masterdesainhapus', $data);
    }

    public function hapus_masterdesain($id)
    {
        $last_edit = Auth::user()->id;
        $hapus = Masterdesain::find($id);

        $hapus->last_edit        = $last_edit;
        $hapus->delete();
        $hapus->save();
        return redirect()->back();
    }

    public function restore($id)
    {
        Masterdesain::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function update_masterdesain($id)
    {
        $cabang = cabang();
        $update = Masterdesain::find($id);
        $data = [
            'id'            => $id,
            'id_produk'     => $update->id_produk,
            'id_cabang'     => $update->id_cabang,
            'masterdesain'  => $update->masterdesain,
            'last_edit'     => $update->last_edit,
        ];

        $id_produk = $update->id_produk;
        $arrayakses = Modelroti::where('id', '=', "$id_produk")->get()->first();
        $data2 = [
            'merek'         => $arrayakses->merek,
            'produk'        => $arrayakses->produk,
            'kode'          => $arrayakses->kode,
        ];
        if (caricabang($update->id_cabang) == cabang()) {
            return View('wodesain.masterdesain.masterdesainupdate', $data, $data2);
        } else {
            return View('wodesain.home');
        }
    }

    public function update_action(Request $request)
    {
        $id             = $request->id;
        $namaproduk     = $request->namaproduk;
        $cabang         = cabang();
        $time           = time();
        $kodeproduk     = $request->kodeproduk;
        $last_edit      = $request->last_edit;

        $request->validate(
            [
                'id'                    =>  'required',
                'masterdesain'          =>  'required|mimes:jpg,png,jpeg,jfif|image|max:10240',
                'last_edit'             =>  'required',
            ],
            [
                'id.required'           =>  'Id Produk Tidak Boleh Kosong',
                'masterdesain.required' =>  'Silahkan Upload master desain terlebih dahulu',
                'masterdesain.mimes'    =>  'Format Master Desain harus Berupa Gambar',
                'masterdesain.max'      =>  'Ukuran Maksimal Master Desain tidak boleh melebihi 10 Mb',
                'last_edit.required'    =>  'Kolom Pengedit Terakhir Tidak Boleh Kosong',
            ]
        );


        $request->file('masterdesain')->storeAs('uploads/wo/masterdesain/' . $cabang, $time . '-' . $kodeproduk . '-' . $cabang . '.' . $request->file('masterdesain')->extension());
        $masterdesain   = $time . '-' . $kodeproduk . '-' . $cabang . '.' . $request->file('masterdesain')->extension();

        $edit      = Masterdesain::find($id);

        $edit->masterdesain     = $masterdesain;
        $edit->last_edit        = $last_edit;
        $edit->save();
        return redirect("/wodesain/masterdesain")->with('success', 'Sukses, Master Desain ' . $namaproduk . ' Berhasil disimpan');
    }

    public function wodesain()
    {
        $cabang = Auth::user()->cabang;
        $data = [
            'dataWodesain' =>  Wodesainutama::select(
                "tb_wodesain.*",
                "tb_roti.produk as namaproduk",
                "tb_roti.kode",
                "tb_roti.merek",
                "tb_cabang.cabang"
            )
                ->where('tb_wodesain.cabang', '=', "$cabang")
                ->where('tb_wodesain.jenis', '=', '0')
                ->join("tb_roti", "tb_roti.id", "=", "tb_wodesain.produk")
                ->join("tb_cabang", "tb_cabang.id", "=", "tb_wodesain.cabang")
                ->get()
        ];
        return View('wodesain.list.wodesain', $data);
    }

    public function woukuran()
    {
        $cabang = Auth::user()->cabang;
        $data = [
            'dataWodesain' =>  Wodesainutama::select(
                "tb_wodesain.*",
                "tb_roti.produk as namaproduk",
                "tb_roti.kode",
                "tb_roti.merek",
                "tb_cabang.cabang"
            )
                ->where('tb_wodesain.cabang', '=', "$cabang")
                ->where('tb_wodesain.jenis', '=', '1')
                ->join("tb_roti", "tb_roti.id", "=", "tb_wodesain.produk")
                ->join("tb_cabang", "tb_cabang.id", "=", "tb_wodesain.cabang")
                ->get()
        ];
        return View('wodesain.list.woukuran', $data);
    }

    public function desaindetail($id)
    {
        $utama = Wodesainutama::find($id);
        $utama->id = $id;
        $roti = Modelroti::find($utama->produk);
        $masterdesain = Masterdesain::find($utama->produk);
        $data = [
            'utama'         => $utama,
            'id'            => $id,
            'nomor'         => $utama->nomor,
            'jenis'         => $utama->jenis,
            'bulan'         => $utama->bulan,
            'tgl'           => $utama->tgl,
            'cabang'        => $utama->cabang,
            'merek'         => $roti->merek,
            'produk'        => $roti->produk,
            'kode'          => $roti->kode,
            'masterdesain'  => $masterdesain->masterdesain,
            'izinedar'      => $utama->izinedar,
            'mui'           => $utama->mui,
            'komunikasi'    => $utama->komunikasi,
            'deskripsi'     => $utama->deskripsi,
            'status'        => $utama->status,
            'lampiran1'     => $utama->lampiran1,
            'lampiran2'     => $utama->lampiran2,
            'lampiran3'     => $utama->lampiran3,
            'last_edit'     => $utama->last_edit,
        ];

        return View('wodesain.detail', $data, compact('utama'));
    }
}
