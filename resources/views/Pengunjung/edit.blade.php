@extends('layout')

@section('content')
<div class="container-fluid">
  <h1 class="mt-4">Edit Data Pengunjung</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Pengunjung/Edit</li>
  </ol>

  <div class="card mb-4 col-lg-4 col-md-12">
    <div class="card-header"><i class="fas fa-edit mr-1"></i>Edit Data Pengunjung</div>
    <div class="card-body">

      <form action="{{ route('pengunjung.update', $pengunjung->id_pengunjung) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <div class="form-group">
                <label for="nm_pengunjung">Nama</label>
                <input type="hidden" name="kd_penginap" value="{{ $pengunjung->kd_penginap }}">
                <input class="form-control" id="nama" readonly value="{{ $pengunjung->nm_penginap }}">
              </div>
              <!-- Jenis kamar -->
              <div class="form-group">
                <label for="jenis">Jenis Kamar</label>
                <select class="form-select" aria-label="Default select example" name="kd_kamar">
                  <!-- tampilkan pilihan kamar di reservasi -->
                  <option hidden selected value="{{ $pengunjung->kd_kamar }}">{{ $pengunjung->jenis }}</option>
                  @foreach ($kamar as $k)
                  <option value="{{ $k->id_kamar }}">{{ $k->jenis }}</option>
                  @endforeach
                </select>
              </div>
              <!-- Jumlah -->
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                  <option hidden selected value="{{ $pengunjung->status }}">{{ $pengunjung->status }}</option>
                  <option value="Check In">Check In</option>
                  <option value="Check Out">Check Out</option>
                </select>
              </div>
              <!-- button submit -->
              <button type="submit" class="btn btn-primary mt-3">Simpan</button>
              <!-- back -->
              <a href="{{ route('pengunjung.index') }}" class="btn btn-light mt-3">Kembali</a>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection