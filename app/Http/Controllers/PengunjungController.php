<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penginap;
use Illuminate\Support\Facades\DB;


class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pengunjung = DB::table('pengunjung')->join('penginap', 'pengunjung.kd_penginap', '=', 'penginap.id_penginap')->join('kamar', 'pengunjung.kd_kamar', '=', 'kamar.id_kamar')->select('pengunjung.*', 'kamar.jenis', 'penginap.nm_penginap')->get();

        $kamar = Kamar::all();
        $penginap = Penginap::all();

        return view('pengunjung.index', compact('pengunjung'), compact('kamar', 'penginap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi lalu input data
        $request->validate([
            'kd_penginap' => 'required',
            'kd_kamar' => 'required',
            'status' => 'required',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('pengunjung.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengunjung $pengunjung)
    {
        $pengunjung = DB::table('pengunjung')->join('penginap', 'pengunjung.kd_penginap', '=', 'penginap.id_penginap')->join('kamar', 'pengunjung.kd_kamar', '=', 'kamar.id_kamar')->select('pengunjung.*', 'kamar.jenis', 'penginap.nm_penginap')->where('id_pengunjung', $pengunjung->id_pengunjung)->first();

        $kamar = Kamar::all();
        $penginap = Penginap::all();

        return view('pengunjung.edit', compact('pengunjung'), compact('kamar', 'penginap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengunjung $pengunjung)
    {
        // validasi lalu input data
        $request->validate([
            'kd_penginap' => 'required',
            'kd_kamar' => 'required',
            'status' => 'required',
        ]);

        $pengunjung->update($request->all());

        return redirect()->route('pengunjung.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengunjung $pengunjung)
    {
        // hapus data berdasarkan id yang dipilih
        Pengunjung::destroy($pengunjung->id_pengunjung);

        return redirect()->route('pengunjung.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
