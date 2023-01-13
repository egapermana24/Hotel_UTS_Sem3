@extends('layout')

@section('content')
<div class="container-fluid">
  <h1 class="mt-4">Edit Data Kamar</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Kamar/Edit</li>
  </ol>

  <div class="card mb-4">
    <div class="card-header"><i class="fas fa-edit mr-1"></i>Edit Data Kamar</div>
    <div class="card-body">

      <form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="kd_kamar">Kode Kamar</label>
              <input type="text" class="form-control" id="kd_kamar" name="kd_kamar" value="{{ $kamar->kd_kamar }}">
            </div>
            <div class="form-group">
              <label for="no_kamar">No. Kamar</label>
              <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="{{ $kamar->no_kamar }}">
            </div>
            <div class="form-group">
              <label for="jenis">Jenis Kamar</label>
              <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                <option hidden selected value="{{ $kamar->jenis }}">{{ $kamar->jenis }}</option>
                <option value="Standard Room">Standard Room</option>
                <option value="Superior Room">Superior Room</option>
                <option value="Deluxe Room">Deluxe Room</option>
                <option value="Twin Room">Twin Room</option>
                <option value="Single Room">Single Room</option>
                <option value="Double Room">Double Room</option>
                <option value="Family Room">Family Room</option>
                <option value="Junior Suite">Junior Suite</option>
                <option value="Suite Room">Suite Room</option>
                <option value="Presidential Suite">Presidential Suite</option>
                <option value="Connecting Room">Connecting Room</option>
                <option value="Murphy Room">Murphy Room</option>
                <option value="Disabled Room">Disabled Room</option>
                <option value="Cabana Room">Cabana Room</option>
                <option value="Penthouse Room">Penthouse Room</option>
              </select>
            </div>
            <div class="form-group">
              <label for="fasilitas">Fasilitas</label>
              <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="{{ $kamar->fasilitas }}">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" value="{{ $kamar->harga }}">
            </div>
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" value="{{ $kamar->stok }}">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="foto">Foto</label>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/'.$kamar->foto) }}" class="card-img-top" alt="Foto Kamar">
                <div class="card-body">
                  <p class="card-text"><input type="file" class="form-control" id="foto" name="foto" value="{{ $kamar->foto }}"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- button submit -->
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('kamar.index') }}" class="btn btn-light mt-3">Kembali</a>
      </form>

    </div>
  </div>
</div>
@endsection