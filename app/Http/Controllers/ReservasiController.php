<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Models\Kamar;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join table reservasi dan kamar lalu paginate

        $reservasi = DB::table('reservasi')->join('kamar', 'reservasi.kd_kamar', '=', 'kamar.id_kamar')->select('reservasi.*', 'kamar.jenis')->paginate(5);

        $kamar = Kamar::all();
        return view('reservasi.index', compact('reservasi'), compact('kamar'));
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
        $reservasi = DB::table('reservasi')->join('kamar', 'reservasi.kd_kamar', '=', 'kamar.id_kamar')->select('reservasi.*', 'kamar.jenis')->where('nm_customer', 'like', "%" . $keyword . "%")->paginate(5);
        return view('reservasi.index', ['reservasi' => $reservasi], compact('kamar'));
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

        // hitung diskon 2.5% jika jumlah > 3
        $jumlah = $request->jumlah;
        // ambil harga dari tabel kamar berdasarkan kd_kamar
        $subTotal = $jumlah * $harga;
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
            'tgl_reservasi' => 'required',
            'nm_customer' => 'required',
            'kd_kamar' => 'required',
            'jumlah' => 'required',
        ]);

        DB::table('reservasi')->insert([
            'tgl_reservasi' => $request->tgl_reservasi,
            'nm_customer' => $request->nm_customer,
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



        return redirect()->route('reservasi.index')
            ->with('success', 'Data reservasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi $reservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi $reservasi)
    {
        // join table untuk jenis kamar
        $reservasi = DB::table('reservasi')->join('kamar', 'reservasi.kd_kamar', '=', 'kamar.id_kamar')->select('reservasi.*', 'kamar.jenis')->where('id_reservasi', $reservasi->id_reservasi)->first();

        $kamar = Kamar::all();

        return view('reservasi.edit', compact('reservasi'), compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        // memanggil harga dari tabel kamar
        $harga = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('harga');

        // hitung diskon 2.5% jika jumlah > 3
        $jumlah = $request->jumlah;
        // ambil harga dari tabel kamar berdasarkan kd_kamar
        $subTotal = $jumlah * $harga;
        if ($jumlah >= 3) {
            $diskon = $subTotal * 0.025;
            $pajak = $subTotal * 0.1;
            $total = $subTotal + $pajak - $diskon;
        } else {
            $diskon = 0;
            $pajak = $subTotal * 0.1;
            $total = $subTotal + $pajak - $diskon;
        }

        // update data reservasi
        $request->validate([
            'tgl_reservasi' => 'required',
            'nm_customer' => 'required',
            'kd_kamar' => 'required',
            'jumlah' => 'required',
        ]);

        DB::table('reservasi')->where('id_reservasi', $reservasi->id_reservasi)->update([
            'tgl_reservasi' => $request->tgl_reservasi,
            'nm_customer' => $request->nm_customer,
            'kd_kamar' => $request->kd_kamar,
            'jumlah' => $request->jumlah,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total' => $total,
        ]);

        // update stok kamar
        // logika jika stok kamar sebelumnya lebih besar atau kecil dari stok kamar sekarang

        if ($reservasi->jumlah > $request->jumlah) {
            $stok = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('stok');
            $stokBaru = $stok + ($reservasi->jumlah - $request->jumlah);
            DB::table('kamar')->where('id_kamar', $request->kd_kamar)->update([
                'stok' => $stokBaru
            ]);
        } else {
            $stok = DB::table('kamar')->where('id_kamar', $request->kd_kamar)->value('stok');
            $stokBaru = $stok - ($request->jumlah - $reservasi->jumlah);
            DB::table('kamar')->where('id_kamar', $request->kd_kamar)->update([
                'stok' => $stokBaru
            ]);
        }

        return redirect()->route('reservasi.index')
            ->with('success', 'Data reservasi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi $reservasi)
    {
        // update stok kamar
        $stok = DB::table('kamar')->where('id_kamar', $reservasi->kd_kamar)->value('stok');
        $stokBaru = $stok + $reservasi->jumlah;
        DB::table('kamar')->where('id_kamar', $reservasi->kd_kamar)->update([
            'stok' => $stokBaru
        ]);
        // menghapus data kamar berdasarkan id
        Reservasi::destroy($reservasi->id_reservasi);

        return redirect()->route('reservasi.index')
            ->with('success', 'Data reservasi berhasil dihapus.');
    }
}
