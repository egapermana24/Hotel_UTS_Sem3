@extends('layout')

@section('content')


<!-- halaman dasboard -->

<div class="container-fluid">
  <div class="row mb-5 mt-3">
    <div class="col-6">
      <div class="card shadow">
        <div class="card-header bg-dark text-light">
          Dashboard
        </div>
        <div class="card-body">
          <h4 class="card-text display-6">Selamat Datang, <br> {{ auth()->user()->name }}</h4>
          <hr>
          <p class="card-title lead">Di Sistem Pengelolaan data Hotel Pangeran Cirebon</p>
        </div>
        <div class="card-footer text-muted">
          Semoga sehat dan bahagia selalu
        </div>
      </div>
    </div>
    <div class="col-6 card p-3 shadow">
      <img style="height: 210px;" src="{{asset('Assets/img/1.webp')}}" class="img-fluid" alt="Foto Hotel">
    </div>
  </div>
  <div class="row pb-4 text-center">
    <div class="col-3 col-sm-3">
      <div class="card mx-auto shadow">
        <div class="card-body">
          <h5 class="card-title">Total Jenis Kamar</h5>
          <hr>
          <p class="card-text display-4">{{ $kamar }}</p>
        </div>
      </div>
    </div>
    <div class="col-3 col-sm-3">
      <div class="card mx-auto shadow">
        <div class="card-body">
          <h5 class="card-title">Total Pengunjung</h5>
          <hr>
          <p class="card-text display-4">{{ $pengunjung }}</p>

        </div>
      </div>
    </div>

    <div class="col-3 col-sm-3">
      <div class="card mx-auto shadow">
        <div class="card-body">
          <h5 class="card-title">Total Reservasi</h5>
          <hr>
          <p class="card-text display-4">{{ $reservasi }}</p>

        </div>
      </div>
    </div>
    <div class="col-3 col-sm-3">
      <div class="card mx-auto shadow">
        <div class="card-body">
          <h5 class="card-title ">Stok Kamar</h5>
          <hr>
          <p class="card-text display-4">{{ $total_stok }}</p>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection