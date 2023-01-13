@extends('layout')

@section('content')

<!-- halaman show -->
<div class="container-fluid">
  <h1 class="mt-4">Detail Data Kamar</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Kamar/Detail</li>
  </ol>

  <div class="card mb-4">
    <div class="card-header"><i class="fas fa-info-circle mr-1"></i>Detail Data Kamar</div>
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Kode Kamar</div>
                {{ $kamar->kd_kamar }}
              </div>
            </li>
          </ol>

          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">No. Kamar</div>
                {{ $kamar->no_kamar }}
              </div>
            </li>
          </ol>

          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Jenis Kamar</div>
                {{ $kamar->jenis }}
              </div>
            </li>
          </ol>


          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Harga</div>
                {{ $kamar->harga }}
              </div>
            </li>
          </ol>

          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Stok</div>
                {{ $kamar->stok }}
              </div>
            </li>
          </ol>

          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Fasilitas</div>
                {{ $kamar->fasilitas }}
              </div>
            </li>
          </ol>

        </div>
        <div class="col-5">
          <ol class="list-group pb-2">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2">
                <div class="fw-bold">Foto</div>
                <img src="{{ asset('images/'.$kamar->foto) }}" width="350px" alt="Foto Kamar">
              </div>
            </li>
          </ol>
        </div>
      </div>
      <a href="{{ route('kamar.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
  </div>
</div>

@endsection