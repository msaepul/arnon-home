<?php

namespace App\Http\Controllers;

use App\Models\Modelakses;
use App\Models\Modelcabang;
use App\Models\User;
use App\Models\Modeldept;
use App\Models\Modelkategori;
use App\Models\Modelutama;
use App\Models\Modelhome;
use App\Imports\Import;
use App\Exports\Export;
use App\Exports\Grafik;
use App\Exports\PTPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class Layout extends Controller
{

    public function index()
    {
        return View('main');
    }

    public function grafik()
    {
        $data = [
            'invoices' => Modelutama::all()->where('pic', '=', "Zulkarnain ")
        ];

        return View('layout.report.grafik', $data);
    }

    public function home()
    {
        $data = [
            'dataUtama' => Modelutama::all()
                ->where('lokasi', "ekspedisi")
                ->where('obyek', "sopir")
        ];
        return View('layout.home', $data);
    }

    public function foto()
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' || $dept == 'BM' || ($dept == 'EDP' && $cabang == 'HO')) {
            $data = [
                'dataUtama' => Modelutama::where([
                    ['lampiran1', '!=', "-"],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['lampiran1', '!=', "-"],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        } else {
            $data = [
                'dataUtama' => Modelutama::where([
                    ['lampiran1', '!=', "-"],
                    ['d_dept', '=', "$dept"],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['lampiran1', '!=', "-"],
                    ['k_dept', '=', "$dept"],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        }
        return View('layout.foto', $data);
    }

    public function video()
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' || $dept == 'BM' || ($dept == 'EDP' && $cabang == 'HO')) {
            $data = [
                'dataUtama' => Modelutama::where([
                    ['lampiran1', '!=', "-"],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['lampiran1', '!=', "-"],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        } else {
            $data = [
                'dataUtama' => Modelutama::where([
                    ['lampiran1', '!=', "-"],
                    ['d_dept', '=', "$dept"],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['lampiran1', '!=', "-"],
                    ['k_dept', '=', "$dept"],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        }
        return View('layout.video', $data);
    }

    public function pdf()
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' || $dept == 'BM' || ($dept == 'EDP' && $cabang == 'HO')) {
            $data = [
                'dataUtama' => Modelutama::where([
                    ['lampiran1', '!=', "-"],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['lampiran1', '!=', "-"],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        } else {
            $data = [
                'dataUtama' => Modelutama::where([
                    ['lampiran1', '!=', "-"],
                    ['d_dept', '=', "$dept"],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['lampiran1', '!=', "-"],
                    ['k_dept', '=', "$dept"],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        }
        return View('layout.pdf', $data);
    }

    public function status()
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;

        if ($dept == 'SIS' && $cabang == 'HO') {
            $draft = [
                'draft' => Modelutama::where([
                    ['status', '=', 'draft'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];

            $ditolak = [
                'ditolak' => Modelutama::where([
                    ['status', '=', 'ditolak'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];

            $cancel = [
                'cancel' => Modelutama::where([
                    ['status', '=', 'cancel'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];

            $confirm = [
                'confirm' => Modelutama::where([
                    ['status', '=', 'confirm'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];

            $confbm = [
                'confbm' => Modelutama::where([
                    ['status', '=', 'confbm'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];

            $unclose = [
                'unclose' => Modelutama::where([
                    ['status', '=', 'unclose'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];

            $close = [
                'close' => Modelutama::where([
                    ['status', '=', 'close'],
                    ['jenis', '=', "eksternal"],
                ])->get(),
            ];
        } elseif ($dept == 'SIS' || $dept == 'BM') {

            $draft = [
                'draft' => Modelutama::where([
                    ['status', '=', 'draft'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'draft'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];

            $ditolak = [
                'ditolak' => Modelutama::where([
                    ['status', '=', 'ditolak'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'ditolak'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];

            $cancel = [
                'cancel' => Modelutama::where([
                    ['status', '=', 'cancel'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'cancel'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];

            $confirm = [
                'confirm' => Modelutama::where([
                    ['status', '=', 'confirm'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'confirm'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];

            $confbm = [
                'confbm' => Modelutama::where([
                    ['status', '=', 'confbm'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'confbm'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];

            $unclose = [
                'unclose' => Modelutama::where([
                    ['status', '=', 'unclose'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'unclose'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];

            $close = [
                'close' => Modelutama::where([
                    ['status', '=', 'close'],
                    ['dari', '=', "$cabang"],
                ])->orWhere([
                    ['status', '=', 'close'],
                    ['kepada', '=', "$cabang"],
                ])->get(),
            ];
        } else {
            $draft = [
                'draft' => Modelutama::where([
                    ['status', '=', 'draft'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'draft'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];

            $ditolak = [
                'ditolak' => Modelutama::where([
                    ['status', '=', 'ditolak'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'ditolak'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];

            $cancel = [
                'cancel' => Modelutama::where([
                    ['status', '=', 'cancel'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'cancel'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];

            $confirm = [
                'confirm' => Modelutama::where([
                    ['status', '=', 'confirm'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'confirm'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];

            $confbm = [
                'confbm' => Modelutama::where([
                    ['status', '=', 'confbm'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'confbm'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];

            $unclose = [
                'unclose' => Modelutama::where([
                    ['status', '=', 'unclose'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'unclose'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];

            $close = [
                'close' => Modelutama::where([
                    ['status', '=', 'close'],
                    ['dari', '=', "$cabang"],
                    ['d_dept', '=', "$dept"],
                ])->orWhere([
                    ['status', '=', 'close'],
                    ['kepada', '=', "$cabang"],
                    ['k_dept', '=', "$dept"],
                ])->get(),
            ];
        }





        // =================================
        // ==========DEPT ALL CAB===========
        // =================================







        $MKT = [
            'MKT' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "MKT"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "MKT"],
            ])->get(),
        ];

        $PRC = [
            'PRC' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "PRC"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "PRC"],
            ])->get(),
        ];

        $PBL = [
            'PBL' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "PBL"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "PBL"],
            ])->get(),
        ];

        $GBB = [
            'GBB' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "GBB"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "GBB"],
            ])->get(),
        ];

        $PRO = [
            'PRO' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "PRO"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "PRO"],
            ])->get(),
        ];

        $ENG = [
            'ENG' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "ENG"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "ENG"],
            ])->get(),
        ];

        $QCT = [
            'QCT' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "QCT"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "QCT"],
            ])->get(),
        ];

        $GPJ = [
            'GPJ' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "GPJ"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "GPJ"],
            ])->get(),
        ];

        $EKS = [
            'EKS' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "EKS"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "EKS"],
            ])->get(),
        ];

        $KND = [
            'KND' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "KND"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "KND"],
            ])->get(),
        ];

        $FIN = [
            'FIN' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "FIN"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "FIN"],
            ])->get(),
        ];

        $ACC = [
            'ACC' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "ACC"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "ACC"],
            ])->get(),
        ];

        $HRD = [
            'HRD' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "HRD"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "HRD"],
            ])->get(),
        ];

        $SIS = [
            'SIS' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "SIS"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "SIS"],
            ])->get(),
        ];

        $EDP = [
            'EDP' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "EDP"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "EDP"],
            ])->get(),
        ];

        $TAX = [
            'TAX' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "TAX"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "TAX"],
            ])->get(),
        ];

        $GRR = [
            'GRR' => Modelutama::where([
                ['jenis', '=', "eksternal"],
                ['dari', '!=', "HO"],
                ['d_dept', '=', "GRR"],
            ])->orWhere([
                ['jenis', '=', "eksternal"],
                ['kepada', '!=', "HO"],
                ['k_dept', '=', "GRR"],
            ])->get(),
        ];





        // =================================
        // ===========DEPT CABANG===========
        // =================================





        $CABMKT = [
            'CABMKT' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "MKT"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "MKT"],
            ])->get(),
        ];

        $CABPRC = [
            'CABPRC' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "PRC"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "PRC"],
            ])->get(),
        ];

        $CABPBL = [
            'CABPBL' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "PBL"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "PBL"],
            ])->get(),
        ];

        $CABGBB = [
            'CABGBB' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "GBB"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "GBB"],
            ])->get(),
        ];

        $CABPRO = [
            'CABPRO' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "PRO"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "PRO"],
            ])->get(),
        ];

        $CABENG = [
            'CABENG' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "ENG"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "ENG"],
            ])->get(),
        ];

        $CABQCT = [
            'CABQCT' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "QCT"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "QCT"],
            ])->get(),
        ];

        $CABGPJ = [
            'CABGPJ' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "GPJ"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "GPJ"],
            ])->get(),
        ];

        $CABEKS = [
            'CABEKS' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "EKS"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "EKS"],
            ])->get(),
        ];

        $CABKND = [
            'CABKND' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "KND"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "KND"],
            ])->get(),
        ];

        $CABFIN = [
            'CABFIN' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "FIN"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "FIN"],
            ])->get(),
        ];

        $CABACC = [
            'CABACC' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "ACC"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "ACC"],
            ])->get(),
        ];

        $CABHRD = [
            'CABHRD' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "HRD"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "HRD"],
            ])->get(),
        ];

        $CABSIS = [
            'CABSIS' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "SIS"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "SIS"],
            ])->get(),
        ];

        $CABEDP = [
            'CABEDP' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "EDP"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "EDP"],
            ])->get(),
        ];

        $CABTAX = [
            'CABTAX' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "TAX"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "TAX"],
            ])->get(),
        ];

        $CABGRR = [
            'CABGRR' => Modelutama::where([
                ['dari', '=', "$cabang"],
                ['d_dept', '=', "GRR"],
            ])->orWhere([
                ['kepada', '=', "$cabang"],
                ['k_dept', '=', "GRR"],
            ])->get(),
        ];





        // =================================
        // ==============CABANG=============
        // =================================

        $PDL = [
            'PDL' => Modelutama::where([
                ['dari', '=', "PDL"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "PDL"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $TGL = [
            'TGL' => Modelutama::where([
                ['dari', '=', "TGL"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "TGL"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $MDO = [
            'MDO' => Modelutama::where([
                ['dari', '=', "MDO"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "MDO"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $MKS = [
            'MKS' => Modelutama::where([
                ['dari', '=', "MKS"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "MKS"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $KDR = [
            'KDR' => Modelutama::where([
                ['dari', '=', "KDR"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "KDR"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $BDJ = [
            'BDJ' => Modelutama::where([
                ['dari', '=', "BDJ"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "BDJ"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $BWI = [
            'BWI' => Modelutama::where([
                ['dari', '=', "BWI"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "BWI"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $LPG = [
            'LPG' => Modelutama::where([
                ['dari', '=', "LPG"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "LPG"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $DMK = [
            'DMK' => Modelutama::where([
                ['dari', '=', "DMK"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "DMK"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $PLM = [
            'PLM' => Modelutama::where([
                ['dari', '=', "PLM"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "PLM"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $BLI = [
            'BLI' => Modelutama::where([
                ['dari', '=', "BLI"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "BLI"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $PKU = [
            'PKU' => Modelutama::where([
                ['dari', '=', "PKU"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "PKU"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $MDN = [
            'MDN' => Modelutama::where([
                ['dari', '=', "MDN"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "MDN"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $LOM = [
            'LOM' => Modelutama::where([
                ['dari', '=', "LOM"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "LOM"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $PNK = [
            'PNK' => Modelutama::where([
                ['dari', '=', "PNK"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "PNK"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $LLG = [
            'LLG' => Modelutama::where([
                ['dari', '=', "LLG"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "LLG"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $CBL = [
            'CBL' => Modelutama::where([
                ['dari', '=', "CBL"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "CBL"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $JTW = [
            'JTW' => Modelutama::where([
                ['dari', '=', "JTW"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "JTW"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $PLU = [
            'PLU' => Modelutama::where([
                ['dari', '=', "PLU"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "PLU"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $KDI = [
            'KDI' => Modelutama::where([
                ['dari', '=', "KDI"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "KDI"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        $AMQ = [
            'AMQ' => Modelutama::where([
                ['dari', '=', "AMQ"],
                ['jenis', '=', "eksternal"],
            ])->orWhere([
                ['kepada', '=', "AMQ"],
                ['jenis', '=', "eksternal"],
            ])->get(),
        ];

        return View('layout.home', $draft, $ditolak)
            ->with($cancel)
            ->with($confirm)
            ->with($confbm)
            ->with($unclose)
            ->with($close)
            ->with($MKT)
            ->with($PRC)
            ->with($PBL)
            ->with($GBB)
            ->with($PRO)
            ->with($ENG)
            ->with($QCT)
            ->with($GPJ)
            ->with($EKS)
            ->with($KND)
            ->with($FIN)
            ->with($ACC)
            ->with($HRD)
            ->with($SIS)
            ->with($EDP)
            ->with($TAX)
            ->with($GRR)
            // =========
            ->with($CABMKT)
            ->with($CABPRC)
            ->with($CABPBL)
            ->with($CABGBB)
            ->with($CABPRO)
            ->with($CABENG)
            ->with($CABQCT)
            ->with($CABGPJ)
            ->with($CABEKS)
            ->with($CABKND)
            ->with($CABFIN)
            ->with($CABACC)
            ->with($CABHRD)
            ->with($CABSIS)
            ->with($CABEDP)
            ->with($CABTAX)
            ->with($CABGRR)
            // =========
            ->with($PDL)
            ->with($TGL)
            ->with($MDO)
            ->with($MKS)
            ->with($KDR)
            ->with($BDJ)
            ->with($BWI)
            ->with($LPG)
            ->with($DMK)
            ->with($PLM)
            ->with($BLI)
            ->with($PKU)
            ->with($MDN)
            ->with($LOM)
            ->with($PNK)
            ->with($LLG)
            ->with($CBL)
            ->with($JTW)
            ->with($PLU)
            ->with($KDI)
            ->with($AMQ);
    }

    public function add()
    {
        $datenow = date('y', time()) . (date('m', time()));
        $kodemax = [
            'kodeMax' => Modelutama::all()
                ->where('jenis', "eksternal")
                ->where('bulan', "$datenow")
                ->max('nomor')
        ];
        $data = [
            'dataKategori' => Modelkategori::all()->where('ket', "kategori"),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataCabang' => Modelcabang::all(),

        ];
        return View('layout.add', $data, $kodemax);
    }

    public function addin()
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;
        $datenow = date('y', time()) . (date('m', time()));
        $kodemax = [
            'kodeMax' => Modelutama::all()
                ->where('jenis', "internal")
                ->where('dari', "$cabang")
                ->where('bulan', "$datenow")
                ->max('nomor')
        ];
        $data = [
            'dataKategori' => Modelkategori::all()->where('ket', "kategori"),
            'datasubKategori8' => Modelkategori::all()->where('ket', "sub-kategori")->where('id_sub', "8"),
            'datasubKategori3' => Modelkategori::all()->where('ket', "sub-kategori")->where('id_sub', "3"),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataCabang' => Modelcabang::all(),

        ];
        return View('layout.addinternal', $data, $kodemax);
    }

    public function addptpp_action(Request $request)
    {
        $idlogin = Auth::user()->id;
        $userlogin = Auth::user()->nama_lengkap;
        $request->validate(
            [
                'nomor'         =>  'required|unique:tb_utama',
                'jenis'         =>  'required',
                'bulan'         =>  'required',
                'tgl'           =>  'required',
                'kategori'      =>  'required',
                'dari'          =>  'required',
                'd_dept'        =>  'required',
                'kepada'        =>  'required',
                'k_dept'        =>  'required',
                'lokasi'        =>  'required',
                'obyek'         =>  'required',
                'keadaan'       =>  'required',
                'lampiran1'      => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif,ogm,wmv,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,mkv,3gp,pdf|max:2048',
                'lampiran2'      => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif,ogm,wmv,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,mkv,3gp,pdf|max:2048',
                'lampiran3'      => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif,ogm,wmv,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,mkv,3gp,pdf|max:2048',
                'lampiran4'      => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif,ogm,wmv,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,mkv,3gp,pdf|max:2048',
                'lampiran5'      => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif,ogm,wmv,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,mkv,3gp,pdf|max:2048',
            ],
            [
                'nomor.required'         =>  'nomor Tidak Boleh Kosong',
                'jenis.required'         =>  'jenis Tidak Boleh Kosong',
                'bulan.required'         =>  'bulan Tidak Boleh Kosong',
                'tgl.required'           =>  'tgl Tidak Boleh Kosong',
                'kategori.required'      =>  'kategori Tidak Boleh Kosong',
                'dari.required'          =>  'dari Tidak Boleh Kosong',
                'd_dept.required'        =>  'd_dept Tidak Boleh Kosong',
                'kepada.required'        =>  'kepada Tidak Boleh Kosong',
                'k_dept.required'        =>  'k_dept Tidak Boleh Kosong',
                'lokasi.required'        =>  'lokasi Tidak Boleh Kosong',
                'obyek.required'         =>  'obyek Tidak Boleh Kosong',
                'keadaan.required'       =>  'keadaan Tidak Boleh Kosong',
                'lampiran1.mimes' => 'File yang anda masukan tidak diizinkan !!',
                'lampiran1.max' => 'File Tidak Boleh Lebih dari 2MB',
                'lampiran2.mimes' => 'File yang anda masukan tidak diizinkan !!',
                'lampiran2.max' => 'File Tidak Boleh Lebih dari 2MB',
                'lampiran3.mimes' => 'File yang anda masukan tidak diizinkan !!',
                'lampiran3.max' => 'File Tidak Boleh Lebih dari 2MB',
                'lampiran4.mimes' => 'File yang anda masukan tidak diizinkan !!',
                'lampiran4.max' => 'File Tidak Boleh Lebih dari 2MB',
                'lampiran5.mimes' => 'File yang anda masukan tidak diizinkan !!',
                'lampiran5.max' => 'File Tidak Boleh Lebih dari 2MB',
            ]
        );

        if ($request->jenis == 'internal') {
            $split = explode('/', substr($request->nomor, 4, 12));
        } else {
            $split = explode('/', $request->nomor);
        }
        if ($request->hasFile('lampiran1')) {
            $time = time();
            $request->file('lampiran1')->storeAs('uploads/ptpp/lampiran/' . $split[1], $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L1 Rev.00' . '.' . $request->file('lampiran1')->extension());
            $path1 = $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L1 Rev.00' . '.' . $request->file('lampiran1')->extension();
        } else {
            $path1 = '-';
        }
        if ($request->hasFile('lampiran2')) {
            $request->file('lampiran2')->storeAs('uploads/ptpp/lampiran/' . $split[1], $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L2 Rev.00' . '.' . $request->file('lampiran2')->extension());
            $path2 = $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L2 Rev.00' . '.' . $request->file('lampiran2')->extension();
        } else {
            $path2 = '-';
        }
        if ($request->hasFile('lampiran3')) {
            $request->file('lampiran3')->storeAs('uploads/ptpp/lampiran/' . $split[1], $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L3 Rev.00' . '.' . $request->file('lampiran3')->extension());
            $path3 = $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L3 Rev.00' . '.' . $request->file('lampiran3')->extension();
        } else {
            $path3 = '-';
        }
        if ($request->hasFile('lampiran4')) {
            $request->file('lampiran4')->storeAs('uploads/ptpp/lampiran/' . $split[1], $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L4 Rev.00' . '.' . $request->file('lampiran4')->extension());
            $path4 = $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L4 Rev.00' . '.' . $request->file('lampiran4')->extension();
        } else {
            $path4 = '-';
        }
        if ($request->hasFile('lampiran5')) {
            $request->file('lampiran5')->storeAs('uploads/ptpp/lampiran/' . $split[1], $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L5 Rev.00' . '.' . $request->file('lampiran5')->extension());
            $path5 = $time . '-' . $split[0] . '-' . $split[1] . '-' . $split[2] . '-L5 Rev.00' . '.' . $request->file('lampiran5')->extension();
        } else {
            $path5 = '-';
        }

        $utama = new Modelutama([

            'nomor'         =>  $request->nomor,
            'jenis'         =>  $request->jenis,
            'bulan'         =>  $request->bulan,
            'tgl'           =>  $request->tgl,
            'kategori'      =>  $request->kategori,
            'subkategori'   =>  $request->subkategori,
            'dari'          =>  $request->dari,
            'd_dept'        =>  $request->d_dept,
            'kepada'        =>  $request->kepada,
            'k_dept'        =>  $request->k_dept,
            'lokasi'        =>  $request->lokasi,
            'obyek'         =>  $request->obyek,
            'keadaan'       =>  $request->keadaan,
            'dibuat'        =>  $request->dibuat,
            'status'        =>  'draft',
            'id_buat'       =>  $request->id_buat,
            'randlink'      =>  $request->randlink,
            'lampiran1'     =>  $path1,
            'lampiran2'     =>  $path2,
            'lampiran3'     =>  $path3,
            'lampiran4'     =>  $path4,
            'lampiran5'     =>  $path5,
        ]);
        $utama->save();

        require_once __DIR__ . '/status/dari.php';
        require_once __DIR__ . '/status/kepada.php';

        return redirect()->route('home')->with('success', 'Sukses, PTPP Berhasil dibuat');
    }

    public function lateptpp()
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;
        $akses = arrayakses();
        $NewDate = Date('Y-m-d', strtotime('-3 days'));
        if ($cabang == 'HO' && $dept == 'SIS') {
            $warning = Modelutama::where('status', '=', 'draft')
                ->where('jenis', '=', 'eksternal')
                ->where('tgl', '<', "$NewDate")
                ->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $warning = Modelutama::where('kepada', '=', "$cabang")
                ->where('status', '=', 'draft')
                ->where('tgl', '<', "$NewDate")
                ->get();
        } else {
            $warning = Modelutama::where('kepada', '=', "$cabang")
                ->Wherein('k_dept', $akses)
                ->where('status', '=', 'draft')
                ->where('tgl', '<', "$NewDate")
                ->get();
        }

        return View('layout.list.lateptpp')->with(['warning' => $warning]);
    }


    public function all()
    {
        $cabang = cabang();
        if ($cabang == 'HO') {
            $dataUtama = Modelutama::where('tb_utama.jenis', '=', 'eksternal')->get();
        } else {
            $dataUtama = Modelutama::where([
                ['dari', '=', "$cabang"]
            ])->orWhere([
                ['kepada', '=', "$cabang"]
            ])->get();
        }

        return View('layout.list.all')->with(['dataUtama' => $dataUtama]);
    }

    public function dari()
    {
        $cabang = cabang();
        $dataUtama = [
            'MKT' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'MKT')
                ->get(),
            'PRC' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'PRC')
                ->get(),
            'PBL' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'PBL')
                ->get(),
            'GBB' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'GBB')
                ->get(),
            'PRO' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'PRO')
                ->get(),
            'ENG' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'ENG')
                ->get(),
            'QCT' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'QCT')
                ->get(),
            'GPJ' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'GPJ')
                ->get(),
            'EKS' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'EKS')
                ->get(),
            'KND' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'KND')
                ->get(),
            'FIN' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'FIN')
                ->get(),
            'ACC' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'ACC')
                ->get(),
            'HRD' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'HRD')
                ->get(),
            'SIS' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'SIS')
                ->get(),
            'EDP' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'EDP')
                ->get(),
            'TAX' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'TAX')
                ->get(),
            'GRR' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'GRR')
                ->get(),
            'RND' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'RND')
                ->get(),
            'GSP' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'GSP')
                ->get(),
            'BM' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'BM')
                ->get(),
            'CRT' => Modelutama::where('dari', '=', $cabang)
                ->where('d_dept', '=', 'CRT')
                ->get(),
        ];
        return View('layout.list.dari', $dataUtama);
    }

    public function untuk()
    {

        $cabang = cabang();
        $dataUtama = [
            'MKT' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'MKT')
                ->get(),
            'PRC' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'PRC')
                ->get(),
            'PBL' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'PBL')
                ->get(),
            'GBB' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'GBB')
                ->get(),
            'PRO' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'PRO')
                ->get(),
            'ENG' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'ENG')
                ->get(),
            'QCT' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'QCT')
                ->get(),
            'GPJ' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'GPJ')
                ->get(),
            'EKS' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'EKS')
                ->get(),
            'KND' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'KND')
                ->get(),
            'FIN' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'FIN')
                ->get(),
            'ACC' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'ACC')
                ->get(),
            'HRD' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'HRD')
                ->get(),
            'SIS' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'SIS')
                ->get(),
            'EDP' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'EDP')
                ->get(),
            'TAX' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'TAX')
                ->get(),
            'GRR' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'GRR')
                ->get(),
            'RND' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'RND')
                ->get(),
            'GSP' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'GSP')
                ->get(),
            'BM' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'BM')
                ->get(),
            'CRT' => Modelutama::where('kepada', '=', $cabang)
                ->where('k_dept', '=', 'CRT')
                ->get(),
        ];
        return View('layout.list.untuk', $dataUtama);
    }


    public function cancel()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'cancel')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'cancel');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'cancel');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        // dd(DB::getQueryLog());
        return View('layout.list.cancel')->with(['dataUtama' => $dataUtama]);
    }


    public function close()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'close')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'close');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'close');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        return View('layout.list.close')->with(['dataUtama' => $dataUtama]);
    }


    public function unclose()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'unclose')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'unclose');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'unclose');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        return View('layout.list.unclose')->with(['dataUtama' => $dataUtama]);
    }


    public function confirm()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'confirm')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'confirm');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'confirm');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        return View('layout.list.confirm')->with(['dataUtama' => $dataUtama]);
    }


    public function confbm()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'confbm')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'confbm');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'confbm');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        return View('layout.list.confbm')->with(['dataUtama' => $dataUtama]);
    }


    public function ditolak()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'ditolak')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'ditolak');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'ditolak');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        return View('layout.list.ditolak')->with(['dataUtama' => $dataUtama]);
    }


    public function draft()
    {
        DB::enableQueryLog();
        $akses = arrayakses();
        $cabang = cabang();
        $dept = Auth::user()->dept;
        if ($dept == 'SIS' && $cabang == 'HO') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'draft')->where('tb_utama.jenis', '=', 'eksternal');
            })->get();
        } elseif ($dept == 'SIS' || $dept == 'BM') {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'draft');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })->get();
        } else {
            $dataUtama = Modelutama::where(function ($query) {
                $query->where('tb_utama.status', '=', 'draft');
            })
                ->where(function ($query) use ($cabang) {
                    $query->where('dari', '=', $cabang)
                        ->orWhere('kepada', '=', $cabang);
                })
                ->where(function ($query) use ($akses) {
                    $query->wherein('d_dept', $akses)
                        ->orWherein('k_dept', $akses);
                })->get();
        }

        return View('layout.list.draft')->with(['dataUtama' => $dataUtama]);
    }

    public function detail($kode)
    {
        $utama = Modelutama::find($kode);
        $utama->kode = $kode;
        $data = [
            'utama'             => $utama,
            'kode'              => $kode,
            'nomor'             => $utama->nomor,
            'kategori'          => $utama->kategori,
            'subkategori'       => $utama->subkategori,
            'dari'              => $utama->dari,
            'd_dept'            => $utama->d_dept,
            'kepada'            => $utama->kepada,
            'k_dept'            => $utama->k_dept,
            'tgl'               => $utama->tgl,
            'lokasi'            => $utama->lokasi,
            'obyek'             => $utama->obyek,
            'keadaan'           => $utama->keadaan,
            'dibuat'            => $utama->dibuat,
            'lampiran1'         => $utama->lampiran1,
            'lampiran2'         => $utama->lampiran2,
            'lampiran3'         => $utama->lampiran3,
            'lampiran4'         => $utama->lampiran4,
            'lampiran5'         => $utama->lampiran5,
            'analisa1'          => $utama->analisa1,
            'analisa2'          => $utama->analisa2,
            'analisa3'          => $utama->analisa3,
            'analisa4'          => $utama->analisa4,
            'analisa5'          => $utama->analisa5,
            'tindakan1'         => $utama->tindakan1,
            'tindakan2'         => $utama->tindakan2,
            'tindakan3'         => $utama->tindakan3,
            'dianalisa'         => $utama->dianalisa,
            'pic'               => $utama->pic,
            'alasan'            => $utama->alasan,
            'tgl_analisa'       => $utama->tgl_analisa,
            'target_selesai'    => $utama->target_selesai,
            'jenis'             => $utama->jenis,
            'status'            => $utama->status,
        ];

        return View('layout.detail', $data, compact('utama'));
    }

    public function edit($kode)
    {
        $cabang = Auth::user()->cabang;
        $dept = Auth::user()->dept;
        $ubah = Modelutama::find($kode);
        $data = [
            'kode'              => $kode,
            'nomor'             => $ubah->nomor,
            'kategori'          => $ubah->kategori,
            'dari'              => $ubah->dari,
            'd_dept'            => $ubah->d_dept,
            'kepada'            => $ubah->kepada,
            'k_dept'            => $ubah->k_dept,
            'tgl'               => $ubah->tgl,
            'lokasi'            => $ubah->lokasi,
            'obyek'             => $ubah->obyek,
            'keadaan'           => $ubah->keadaan,
            'dibuat'            => $ubah->dibuat,
            'lampiran1'         => $ubah->lampiran1,
            'lampiran2'         => $ubah->lampiran2,
            'lampiran3'         => $ubah->lampiran3,
            'lampiran4'         => $ubah->lampiran4,
            'lampiran5'         => $ubah->lampiran5,
            'jenis'             => $ubah->jenis,
            'analisa1'          => $ubah->analisa1,
            'analisa2'          => $ubah->analisa2,
            'analisa3'          => $ubah->analisa3,
            'analisa4'          => $ubah->analisa4,
            'analisa5'          => $ubah->analisa5,
            'dianalisa'         => $ubah->dianalisa,
            'tindakan1'         => $ubah->tindakan1,
            'tindakan2'         => $ubah->tindakan2,
            'tindakan3'         => $ubah->tindakan3,
            'pic'               => $ubah->pic,
            'tgl_analisa'       => $ubah->tgl_analisa,
            'target_selesai'    => $ubah->target_selesai,
            'status'            => $ubah->status,
            'alasan'            => $ubah->alasan,
            'alasan_reverse'    => $ubah->alasan_reverse,
            'tgl_analisa'       => $ubah->tgl_analisa,
            'dept'              => $ubah->dept,
            'dataUser' => Modelhome::all()->where('dept', "$dept")->where('cabang', "$cabang")
        ];


        return View('layout.edit', $data, compact('ubah'));
    }

    public function editptpp_action(Request $request)
    {
        $kode           = $request->kode;
        $analisa1       = $request->analisa1;
        $analisa2       = $request->analisa2;
        $analisa3       = $request->analisa3;
        $analisa4       = $request->analisa4;
        $analisa5       = $request->analisa5;
        $tindakan1      = $request->tindakan1;
        $tindakan2      = $request->tindakan2;
        $tindakan3      = $request->tindakan3;
        $dianalisa      = $request->dianalisa;
        $tgl_analisa    = $request->tgl_analisa;
        $pic            = $request->pic;
        $target_selesai = $request->target_selesai;

        $request->validate(
            [
                'analisa1'          =>  'required',
                'analisa2'          =>  'required',
                'analisa3'          =>  'required',
                'tindakan1'         =>  'required',
                'tindakan2'         =>  'required',
                'pic'               =>  'required',
                'target_selesai'    =>  'required',
            ],
            [
                'analisa1.required'         =>  'Analisa 1 Tidak Boleh Kosong, Gunakan Metode 5 Why',
                'analisa2.required'         =>  'Analisa 2 Tidak Boleh Kosong, Gunakan Metode 5 Why',
                'analisa3.required'         =>  'Analisa 3 Tidak Boleh Kosong, Gunakan Metode 5 Why',
                'tindakan1.required'        =>  'Tindakan 1 Tidak Boleh Kosong, Setidaknya berikan 2 Tindakan Perbaikan',
                'tindakan2.required'        =>  'Tindakan 2 Tidak Boleh Kosong, Setidaknya berikan 2 Tindakan Perbaikan',
                'pic.required'              =>  'Pastikan anda sudah memilih PIC',
                'target_selesai.required'   =>  'Target Selesai Tidak Boleh Kosong',
            ]
        );


        $edit      = Modelutama::find($kode);

        $edit->analisa1       = $analisa1;
        $edit->analisa2       = $analisa2;
        $edit->analisa3       = $analisa3;
        $edit->analisa4       = $analisa4;
        $edit->analisa5       = $analisa5;
        $edit->tindakan1      = $tindakan1;
        $edit->tindakan2      = $tindakan2;
        $edit->tindakan3      = $tindakan3;
        $edit->dianalisa      = $dianalisa;
        $edit->pic            = $pic;
        $edit->tgl_analisa    = $tgl_analisa;
        $edit->target_selesai = $target_selesai;
        $edit->save();
        return redirect("/layout/detail/$kode?b=draft")->with('success', 'Sukses, PTPP Berhasil diedit');
    }

    public function revisi($kode)
    {
        $cabang = cabang();
        $dept = Auth::user()->dept;
        $utama = Modelutama::find($kode);
        $utama->kode = $kode;
        $data = [
            'utama'             => $utama,
            'kode'              => $kode,
            'nomor'             => $utama->nomor,
            'kategori'          => $utama->kategori,
            'dari'              => $utama->dari,
            'd_dept'            => $utama->d_dept,
            'kepada'            => $utama->kepada,
            'k_dept'            => $utama->k_dept,
            'tgl'               => $utama->tgl,
            'lokasi'            => $utama->lokasi,
            'obyek'             => $utama->obyek,
            'keadaan'           => $utama->keadaan,
            'dibuat'            => $utama->dibuat,
            'lampiran1'         => $utama->lampiran1,
            'lampiran2'         => $utama->lampiran2,
            'lampiran3'         => $utama->lampiran3,
            'lampiran4'         => $utama->lampiran4,
            'lampiran5'         => $utama->lampiran5,
            'jenis'             => $utama->jenis,
            'analisa1'          => $utama->analisa1,
            'analisa2'          => $utama->analisa2,
            'analisa3'          => $utama->analisa3,
            'analisa4'          => $utama->analisa4,
            'analisa5'          => $utama->analisa5,
            'dianalisa'         => $utama->dianalisa,
            'tindakan1'         => $utama->tindakan1,
            'tindakan2'         => $utama->tindakan2,
            'tindakan3'         => $utama->tindakan3,
            'pic'               => $utama->pic,
            'tgl_analisa'       => $utama->tgl_analisa,
            'target_selesai'    => $utama->target_selesai,
            'status'            => $utama->status,
            'alasan'            => $utama->alasan,
            'alasan_reverse'    => $utama->alasan_reverse,
            'tgl_analisa'       => $utama->tgl_analisa,
            'dept'              => $utama->dept,
            'dataUser' => Modelhome::all()->where('dept', "$dept")->where('cabang', "$cabang"),
            'dataKategori' => Modelkategori::all()->where('ket', "kategori"),
            'dataDept' => Modeldept::all()->sortBy('dept'),
            'dataCabang' => Modelcabang::all(),
        ];


        return View('layout.revisi', $data, compact('utama'));
    }

    public function revisiptpp_action(Request $request)
    {
        $kode           = $request->kode;
        $kategori       = $request->kategori;
        $d_dept         = $request->d_dept;
        $kepada         = $request->kepada;
        $k_dept         = $request->k_dept;
        $tgl            = $request->tgl;
        $lokasi         = $request->lokasi;
        $obyek          = $request->obyek;
        $keadaan        = $request->keadaan;
        $analisa1       = $request->analisa1;
        $analisa2       = $request->analisa2;
        $analisa3       = $request->analisa3;
        $analisa4       = $request->analisa4;
        $analisa5       = $request->analisa5;
        $tindakan1      = $request->tindakan1;
        $tindakan2      = $request->tindakan2;
        $tindakan3      = $request->tindakan3;
        $dianalisa      = $request->dianalisa;
        $tgl_analisa    = $request->tgl_analisa;
        $pic            = $request->pic;
        $target_selesai = $request->target_selesai;


        $revisi      = Modelutama::find($kode);

        $revisi->kategori       = $kategori;
        $revisi->d_dept         = $d_dept;
        $revisi->kepada         = $kepada;
        $revisi->k_dept         = $k_dept;
        $revisi->tgl            = $tgl;
        $revisi->lokasi         = $lokasi;
        $revisi->obyek          = $obyek;
        $revisi->keadaan        = $keadaan;
        $revisi->analisa1       = $analisa1;
        $revisi->analisa2       = $analisa2;
        $revisi->analisa3       = $analisa3;
        $revisi->analisa4       = $analisa4;
        $revisi->analisa5       = $analisa5;
        $revisi->tindakan1      = $tindakan1;
        $revisi->tindakan2      = $tindakan2;
        $revisi->tindakan3      = $tindakan3;
        $revisi->dianalisa      = $dianalisa;
        $revisi->pic            = $pic;
        $revisi->tgl_analisa    = $tgl_analisa;
        $revisi->target_selesai = $target_selesai;
        $revisi->save();
        return redirect("/layout/detail/$kode?b=draft")->with('success', 'Sukses, PTPP Berhasil diRevisi');
    }

    public function confirm_stat(Request $request)
    {

        $userlogin    = Auth::user()->nama_lengkap;
        $kode         = $request->kode;
        $status       = "confirm";


        $stat      = Modelutama::find($kode);

        $stat->status       = $status;
        $stat->save();

        require_once __DIR__ . '/status/confirm.php';

        return redirect("/layout/detail/$kode?b=confirm")->with('success', 'Sukses, PTPP Berhasil diConfirm');
    }

    public function cancel_stat(Request $request)
    {

        $userlogin    = Auth::user()->nama_lengkap;
        $kode         = $request->kode;
        $alasan         = $request->alasan;
        $status       = "cancel";


        $stat      = Modelutama::find($kode);

        $stat->alasan       = $alasan;
        $stat->status       = $status;
        $stat->save();

        require_once __DIR__ . '/status/cancel.php';

        return redirect("/layout/detail/$kode?b=cancel")->with('success', 'PTPP Sudah Berhasil Anda Batalkan');
    }

    public function terima_stat(Request $request)
    {

        $userlogin    = Auth::user()->nama_lengkap;
        $kode         = $request->kode;
        $status       = "unclose";


        $stat      = Modelutama::find($kode);

        $stat->status       = $status;
        $stat->save();

        require_once __DIR__ . '/status/unclose.php';

        return redirect("/layout/detail/$kode?b=unclose")->with('success', 'Sukses, PTPP Berhasil diTerima. Status saat ini UNCLOSE');
    }

    public function confbm_stat(Request $request)
    {

        $userlogin    = Auth::user()->nama_lengkap;
        $kode         = $request->kode;
        $status       = "confbm";


        $stat      = Modelutama::find($kode);

        $stat->status       = $status;
        $stat->save();

        require_once __DIR__ . '/status/confbm.php';

        return redirect("/layout/detail/$kode?b=confbm")->with('success', 'Sukses, PTPP Berhasil diTerima. Status saat ini CONFIRM BM');
    }

    public function close_stat(Request $request)
    {

        $userlogin    = Auth::user()->nama_lengkap;
        $kode         = $request->kode;
        $status       = "close";


        $stat      = Modelutama::find($kode);

        $stat->status       = $status;
        $stat->save();

        require_once __DIR__ . '/status/close.php';

        return redirect("/layout/detail/$kode?b=unclose")->with('success', 'Sukses, PTPP Berhasil diSelesaikan. Status saat ini CLOSE');
    }

    public function tolak_stat(Request $request)
    {

        $userlogin    = Auth::user()->nama_lengkap;
        $kode         = $request->kode;
        $alasan       = $request->alasan;
        $status       = "ditolak";


        $stat      = Modelutama::find($kode);

        $stat->alasan       = $alasan;
        $stat->status       = $status;
        $stat->save();

        require_once __DIR__ . '/status/ditolak.php';

        return redirect("/layout/detail/$kode?b=ditolak")->with('success', 'Analisa PTPP Sudah Berhasil Anda Tolak');
    }

    public function import()
    {
        Excel::import(new Import, request()->file('file'));

        return back();
    }

    public function export()
    {
        function bln($tanggal)
        {
            if ($tanggal == null) {
                return '-';
            } elseif ($tanggal == '') {
                return '-';
            } else {
                $bulan = [01 => 'Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $hasil_tgl = $bulan[(int) $tanggal];

                return $hasil_tgl;
            }
        }
        $cabang = cabang();
        if ($cabang != 'HO') {
            $jenis = strtoupper(@$_GET['jenis']);
        } else {
            $jenis = 'Eksternal';
        }
        $bulan = strtoupper(bln(@$_GET['bulan']));
        return Excel::download(new PTPP, "Laporan PTPP $jenis BULAN $bulan - $cabang.xlsx");
    }
}
