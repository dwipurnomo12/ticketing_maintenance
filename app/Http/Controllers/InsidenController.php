<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InsidenController extends Controller
{
    public function index()
    {
        $insidenData = Laporan::select('insiden', DB::raw('COUNT(insiden) as total'))
            ->groupBy('insiden')
            ->get();
        $labels = $insidenData->pluck('insiden');
        $data   = $insidenData->pluck('total');


        return view('insiden.index', compact('labels', 'data'));
    }
}
