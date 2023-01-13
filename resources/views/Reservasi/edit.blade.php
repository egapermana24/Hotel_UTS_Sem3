@extends('layout')

@section('content')
<div class="container-fluid">
  <h1 class="mt-4">Edit Data Reservasi</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Reservasi/Edit</li>
  </ol>

  <div class="card mb-4 col-lg-4 col-md-12">
    <div class="card-header"><i class="fas fa-edit mr-1"></i>Edit Data Reservasi</div>
    <div class="card-body">

      <form action="{{ route('reservasi.update', $reservasi->id_reservasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="tgl_reservasi">Tanggal Reservasi</label>
              <input type="date" class="form-control" id="tgl_reservasi" name="tgl_reservasi" value="{{ $reservasi->tgl_reservasi }}">
            </div>
            <div class="form-group">
              <label for="nm_customer">Nama</label>
              <input type="text" class="form-control" id="nm_customer" name="nm_customer" value="{{ $reservasi->nm_customer }}">
            </div>
            <!-- Jenis kamar -->
            <div class="form-group">
              <label for="jenis">Jenis Kamar</label>
              <select class="form-select" aria-label="Default select example" name="kd_kamar">
                <!-- tampilkan pilihan kamar di reservasi -->
                <option hidden selected value="{{ $reservasi->kd_kamar }}">{{ $reservasi->jenis }}</option>
                @foreach ($kamar as $k)
                <option value="{{ $k->id_kamar }}">{{ $k->jenis }}</option>
                @endforeach
              </select>
            </div>
            <!-- Jumlah -->
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $reservasi->jumlah }}">
            </div>
            <!-- button submit -->
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <!-- back -->
            <a href="{{ route('reservasi.index') }}" class="btn btn-light mt-3">Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection