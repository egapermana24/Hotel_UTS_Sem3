@extends('layout')

@section('content')
<div class="container-fluid">
  <h1 class="mt-4">Edit Data Penginapan</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Penginapan/Edit</li>
  </ol>

  <div class="card mb-4 col-lg-4 col-md-12">
    <div class="card-header"><i class="fas fa-edit mr-1"></i>Edit Data Penginapan</div>
    <div class="card-body">

      <form action="{{ route('penginap.update', $penginap->id_penginap) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="tgl_masuk">Tanggal Check In</label>
              <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="{{ $penginap->tgl_masuk }}">
            </div>
            <div class="form-group">
              <label for="tgl_keluar">Tanggal Check Out</label>
              <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="{{ $penginap->tgl_keluar }}">
            </div>
            <div class="form-group">
              <label for="nm_penginap">Nama</label>
              <input type="text" class="form-control" id="nm_penginap" name="nm_penginap" value="{{ $penginap->nm_penginap }}">
            </div>
            <!-- Jenis kamar -->
            <div class="form-group">
              <label for="jenis">Jenis Kamar</label>
              <select class="form-select" aria-label="Default select example" name="kd_kamar">
                <!-- tampilkan pilihan kamar di reservasi -->
                <option hidden selected value="{{ $penginap->kd_kamar }}">{{ $penginap->jenis }}</option>
                @foreach ($kamar as $k)
                <option value="{{ $k->id_kamar }}">{{ $k->jenis }}</option>
                @endforeach
              </select>
            </div>
            <!-- Jumlah -->
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $penginap->jumlah }}">
            </div>
            <!-- button submit -->
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <!-- back -->
            <a href="{{ route('penginap.index') }}" class="btn btn-light mt-3">Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection