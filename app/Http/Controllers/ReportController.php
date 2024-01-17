<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index', [
            'laporans'  => Laporan::with('pesans')->orderBy('id', 'DESC')->get()
        ]);
    }

    public function cetakLaporan()
    {
        $laporans = Laporan::orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('report.cetak-laporan', [
            'laporans'  => $laporans
        ]);

        return $pdf->stream('cetak-laporan.pdf');
    }
}
