<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laporan.index', [
            'laporans'   => Laporan::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'instansi'  => 'required',
            'insiden'   => 'required',
            'file'      => 'required|mimes:pdf,doc,docx'
        ], [
            'nama.required'     => 'Tidak boleh kosong !',
            'instansi.required' => 'Tidak boleh kosong !',
            'insiden.required'  => 'Tidak boleh kosong !',
            'file.required'     => 'Tidak boleh kosong !',
            'file.mimes'        => 'File yang di izinkan adalah pdf,doc,docx'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filePath = null;

        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $filePath   = $file->store('file-laporan', 'public');
        }

        $id_laporan = 'RPT-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

        Laporan::create([
            'id_laporan'    => $id_laporan,
            'nama'          => $request->nama,
            'instansi'      => $request->instansi,
            'insiden'       => $request->insiden,
            'file'          => $filePath,
            'user_id'       => auth()->user()->id
        ]);

        return redirect('/laporan')->with('success', 'Berhasil menambahkan data');
    }
}
