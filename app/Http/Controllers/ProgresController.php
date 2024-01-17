<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProgresController extends Controller
{
    public function index()
    {
        return view('progres.index', [
            'laporans'      => Laporan::with('pesans')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function balas($id)
    {
        $laporan = Laporan::find($id);
        return view('progres.balas', [
            'laporan'   => $laporan
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pesan' => 'required'
        ], [
            'pesan.required'    => 'Form wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pesan::create([
            'laporan_id'    => $request->laporan_id,
            'pesan'         => $request->pesan
        ]);

        return redirect('/progres')->with('success', 'Berhasil mengirimkan progres');
    }
}
