<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', [
            'laporanMasuks'     => Laporan::count(),
            'laporanPending'    => Laporan::where('status', 'pending')->count(),
            'laporanSelesai'    => Laporan::where('status', 'selesai')->count(),
            'laporanDitolak'    => Laporan::where('status', 'ditolak')->count()
        ]);
    }
}
