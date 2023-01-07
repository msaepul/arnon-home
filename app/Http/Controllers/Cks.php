<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelcabang;
use App\Models\Modeldept;
use App\Models\Modelcks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cks extends Controller
{
    public function home()
    {
        $cabang = Auth::user()->cabang;
        $data = [
            'dataUtama' => Modelcks::all(),
            'approve' => Modelcks::where('cabang', '=', "$cabang")
                ->where('status', '=', 'approved')
                ->count(),
            'onprocess' => Modelcks::where('cabang', '=', "$cabang")
                ->where('status', '=', 'onprocess')
                ->count(),
            'reject' => Modelcks::where('cabang', '=', "$cabang")
                ->where('status', '=', 'rejected')
                ->count(),
        ];
        return View('wodesain.home', $data);
    }
}
