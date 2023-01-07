<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wodesainutama;
use App\Models\Modelroti;
use Illuminate\Support\Facades\Auth;

class wodesain extends Component
{
    public $currentStep = 1;
    public $nomor, $merek, $cabang, $tgl, $izinedar, $mui, $deskripsi, $status = 1, $produk, $lampiran1;
    public $successMessage = '';

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $successMessage = '';
        $Roti = [
            'listRotiParoti' => Modelroti::all()
                ->where('merek', "PAROTI"),

            'listRotiArnon' => Modelroti::all()
                ->where('merek', "ARNON"),

            'listRotiJordan' => Modelroti::all()
                ->where('merek', "JORDAN"),
        ];


        $cabang = cabang();
        $datenow = date('y', time()) . (date('m', time()));
        $kodemax = [
            'kodeMax' => Wodesainutama::all()
                ->where('bulan', "$datenow")
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
        $hasilkode = 'WO-' . $monthnow . '-' . $yearnow . '-' . $kodeMaxp;
        $this->nomor = $hasilkode;
        $this->cabang = $cabang;
        $this->tgl = date('d-m-Y');
        return view('livewire.wodesain', $Roti);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'nomor' => 'required|unique:tb_wodesain',
                'produk' => 'required',
                'izinedar' => 'required',
                'mui' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nomor.required'        =>  'Invalid Nomor WO',
                'produk.required'     =>  'Produk Tidak Boleh Kosong',
                'izinedar.required'     =>  'Harap Mengisi Nomor Izin Edar (BPOM/PIRT) Terlebih Dahulu',
                'mui.required'     =>  'Harap Mengisi Nomor Sertifikat Halal Terlebih Dahulu',
                'deskripsi.required'     =>  'Harap Mengisi Deskripsi Terlebih Dahulu',
            ]
        );

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'status' => 'required',
            ],
            [
                'status.required'        =>  'Mohon untuk memilih contoh desain yang paling sesuai',
            ]
        );

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        $kodeproduk = [
            1 => 'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'PAROTI',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'ARNON',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
            'JORDAN',
        ];
        $datenow = date('y', time()) . (date('m', time()));
        $user = Auth::user()->nama_lengkap;
        $merek = $kodeproduk[$this->produk];
        Wodesainutama::create([
            'nomor' => $this->nomor,
            'cabang' => $this->cabang,
            'bulan' => $datenow,
            'tgl' => $this->tgl,
            'merek' => $merek,
            'deskripsi' => $this->deskripsi,
            'lampiran1' => $this->lampiran1,
            'produk' => $this->produk,
            'status' => $this->status,
            'last_edit' => $user,
        ]);

        $this->successMessage = 'WO Perubahan Desain Kemasan Telah Berhasil Dibuat.';

        $this->clearForm();

        return redirect()->route('wodesain.add.desain')->with('success', 'WO Perubahan Desain Kemasan Telah Berhasil Dibuat.');

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->nomor = '';
        $this->cabang = '';
        $this->tgl = '';
        $this->merek = '';
        $this->deskripsi = '';
        $this->produk = '';
        $this->izinedar = '';
        $this->mui = '';
        $this->status = 1;
    }
}
