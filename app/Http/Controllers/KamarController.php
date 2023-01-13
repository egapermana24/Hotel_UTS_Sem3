<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // memperbaiki urutan nomor pada pagination
        $kamar = Kamar::paginate(5);
        return view('kamar.index', ['kamar' => $kamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request->search;
        $kamar = Kamar::where('jenis', 'like', "%" . $keyword . "%")->paginate(5);
        return view('kamar.index', ['kamar' => $kamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_kamar' => 'required',
            'no_kamar' => 'required',
            'jenis' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        Kamar::create($input);
        return redirect()->route('kamar.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = Kamar::find($id);
        return view('Kamar.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('Kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // cek apakah user mengganti foto atau tidak
        if ($request->has('foto')) {
            // hapus foto lama
            $kamar = Kamar::find($id);
            File::delete('images/' . $kamar->foto);
            $request->validate([
                'kd_kamar' => 'required',
                'no_kamar' => 'required',
                'jenis' => 'required',
                'fasilitas' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            $input = $request->all();

            if ($image = $request->file('foto')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['foto'] = "$profileImage";
            }

            $kamar = Kamar::find($id);
            $kamar->update($input);
            return redirect()->route('kamar.index')->with('success', 'Data Berhasil Diubah');
        } else {
            $request->validate([
                'kd_kamar' => 'required',
                'no_kamar' => 'required',
                'jenis' => 'required',
                'fasilitas' => 'required',
                'harga' => 'required',
                'stok' => 'required',
            ]);

            $input = $request->all();

            $kamar = Kamar::find($id);
            $kamar->update($input);
            return redirect()->route('kamar.index')->with('success', 'Data Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus images dari folder
        $kamar = Kamar::find($id);
        File::delete('images/' . $kamar->foto);

        // menghapus data kamar berdasarkan id yang dipilih
        Kamar::destroy($id);
        return redirect()->route('kamar.index')
            ->with('success', 'Data Kamar berhasil dihapus');
    }
}
