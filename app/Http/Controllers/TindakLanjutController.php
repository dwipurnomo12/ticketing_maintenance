<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TindakLanjutController extends Controller
{
    public function index()
    {
        return view('tindak-lanjut.index', [
            'tindakLanjuts' => Laporan::with('pesans')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function approve($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status'  => 'selesai']);

        return redirect()->back()->with('success', 'Laporan selesai di tinjak lanjuti');
    }

    public function reject($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status'  => 'ditolak']);

        Pesan::create([
            'laporan_id' => $laporan->id,
            'pesan'      => request('pesan')
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditolak');
    }
}
