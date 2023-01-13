<?php

namespace App\Http\Controllers;

use App\Models\Penginap;
use Illuminate\Http\Request;
use App\Models\Kamar;
use Illuminate\Support\Facades\DB;


class PenginapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join table penginap dan kamar
        $penginap = DB::table('penginap')->join('kamar', 'penginap.kd_kamar', '=', 'kamar.id_kamar')->select('penginap.*', 'kamar.jenis')->paginate(5);

        $kamar = Kamar::all();
        return view('penginap.index', compact('penginap'), compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request->search;
        $kamar = Kamar::all();
        $penginap = DB::table('penginap')->join('kamar', 'penginap.kd_kamar', '=', 'kamar.id_kamar')->select('penginap.*', 'kamar.jenis')->where('nm_penginap', 'like', "%" . $keyword . "%")->paginate(5);
        return view('penginap.index', ['penginap' => $penginap], compact('kamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // memanggil harga dari tabel kamar
        $harga = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('harga');

        // mengubah format tanggal menjadi angka
        $tgl_masuk = strtotime($request->tgl_masuk);
        $tgl_keluar = strtotime($request->tgl_keluar);
        // menghitung selisih hari
        $lama_inap = ($tgl_keluar - $tgl_masuk) / (60 * 60 * 24);

        // hitung diskon 2.5% jika jumlah > 3
        $jumlah = $request->jumlah;
        // ambil harga dari tabel kamar berdasarkan kd_kamar
        $subTotal = $jumlah * $harga * $lama_inap;
        if ($jumlah >= 3) {
            $diskon = $subTotal * 0.025;
            $pajak = $subTotal * 0.1;
            $total = $subTotal + $pajak - $diskon;
        } else {
            $diskon = 0;
            $pajak = $subTotal * 0.1;
            $total = $subTotal + $pajak - $diskon;
        }






        // insert data ke table reservasi
        // validasi data
        $request->validate([
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'nm_penginap' => 'required',
            'kd_kamar' => 'required',
            'jumlah' => 'required',
        ]);

        DB::table('penginap')->insert([
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'lama_inap' => $lama_inap,
            'nm_penginap' => $request->nm_penginap,
            'kd_kamar' => $request->kd_kamar,
            'jumlah' => $request->jumlah,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total' => $total,
        ]);

        // update stok kamar
        $stok = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('stok');
        $stokBaru = $stok - $request->jumlah;
        DB::table('kamar')->where('id_kamar', $request->kd_kamar)->update([
            'stok' => $stokBaru
        ]);



        return redirect()->route('penginap.index')
            ->with('success', 'Data Penginap berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penginap  $penginap
     * @return \Illuminate\Http\Response
     */
    public function show(Penginap $penginap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penginap  $penginap
     * @return \Illuminate\Http\Response
     */
    public function edit(Penginap $penginap)
    {
        // join table untuk jenis kamar
        $penginap = DB::table('penginap')->join('kamar', 'penginap.kd_kamar', '=', 'kamar.id_kamar')->select('penginap.*', 'kamar.jenis')->where('id_penginap', $penginap->id_penginap)->first();

        $kamar = Kamar::all();

        return view('penginap.edit', compact('penginap'), compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penginap  $penginap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penginap $penginap)
    {
        // mengubah format tanggal menjadi angka
        $tgl_masuk = strtotime($request->tgl_masuk);
        $tgl_keluar = strtotime($request->tgl_keluar);
        // menghitung selisih hari
        $lama_inap = ($tgl_keluar - $tgl_masuk) / (60 * 60 * 24);

        // memanggil harga dari tabel kamar
        $harga = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('harga');

        // hitung diskon 2.5% jika jumlah > 3
        $jumlah = $request->jumlah;
        // ambil harga dari tabel kamar berdasarkan kd_kamar
        $subTotal = $jumlah * $harga * $lama_inap;
        if ($jumlah >= 3) {
            $diskon = $subTotal * 0.025;
            $pajak = $subTotal * 0.1;
            $total = $subTotal + $pajak - $diskon;
        } else {
            $diskon = 0;
            $pajak = $subTotal * 0.1;
            $total = $subTotal + $pajak - $diskon;
        }

        // update data ke table reservasi
        // validasi data
        $request->validate([
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'nm_penginap' => 'required',
            'kd_kamar' => 'required',
            'jumlah' => 'required',
        ]);

        DB::table('penginap')->where('id_penginap', $penginap->id_penginap)->update([
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'lama_inap' => $lama_inap,
            'nm_penginap' => $request->nm_penginap,
            'kd_kamar' => $request->kd_kamar,
            'jumlah' => $request->jumlah,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total' => $total,
        ]);

        if ($penginap->jumlah > $request->jumlah) {
            $stok = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('stok');
            $stokBaru = $stok + ($penginap->jumlah - $request->jumlah);
            DB::table('kamar')->where('id_kamar', $request->kd_kamar)->update([
                'stok' => $stokBaru
            ]);
        } else {
            $stok = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('stok');
            $stokBaru = $stok - ($request->jumlah - $penginap->jumlah);
            DB::table('kamar')->where('id_kamar', $request->kd_kamar)->update([
                'stok' => $stokBaru
            ]);
        }

        return redirect()->route('penginap.index')
            ->with('success', 'Data Penginapan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penginap  $penginap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penginap $penginap)
    {
        // update stok kamar
        $stok = DB::table('kamar')->where('id_kamar', $penginap->kd_kamar)->value('stok');
        $stokBaru = $stok + $penginap->jumlah;
        DB::table('kamar')->where('id_kamar', $penginap->kd_kamar)->update([
            'stok' => $stokBaru
        ]);
        // menghapus data kamar berdasarkan id
        Penginap::destroy($penginap->id_penginap);

        return redirect()->route('penginap.index')
            ->with('success', 'Data Penginapan berhasil dihapus.');
    }
}
