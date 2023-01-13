@extends('layout')

@section('content')


@if ($errors->any())
<div class=" alert alert-danger alert-dismissible fade show col-5 my-2" role="alert">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card mb-4 col-lg-5 col-md-10 col-sm-10">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data Pengunjung
    <button type="button" class="btn btn-sm btn-dark float-end" data-coreui-toggle="modal" data-coreui-target="#create">
      Tambah Data
    </button>
  </div>
  <!-- Button trigger modal -->

  <div class="card-body">
    <div class="table-responsive">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <!-- menampilkan data dari tabel pengunjung -->
      <ol class="list-group list-group-numbered">
        @foreach ($pengunjung as $p)
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $p->nm_penginap }}</div>
            {{ $p->jenis }} <br>
            Status : <span class="badge bg-warning rounded-pill">{{ $p->status }}</span>
          </div>
          <form action="{{ route('pengunjung.destroy',$p->id_pengunjung) }}" method="POST">
            <a href="{{ route('pengunjung.edit',$p->id_pengunjung) }}"><span class="badge bg-info rounded-pill"><i class="fa-solid fa-pen"></i></span></a>
            @csrf
            @method('DELETE')
            <button style="border: none; background-color: white;" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><span class="badge bg-danger rounded-pill"><i class="fa-solid fa-trash"></i></span></button>
          </form>
        </li>
        @endforeach
      </ol>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="create" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLabel">Tambah Data Pengunjung</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pengunjung.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <select class="form-select" aria-label="Default select example" name="kd_penginap" id="nama">
              <option selected hidden disabled>Pilih Pengunjung</option>
              @foreach ($penginap as $p)
              <option value="{{ $p->id_penginap }}">{{ $p->nm_penginap }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Kamar</label>
            <select class="form-select" aria-label="Default select example" name="kd_kamar">
              <option selected hidden disabled>Pilih Kamar</option>
              @foreach ($kamar as $p)
              <option value="{{ $p->id_kamar }}">{{ $p->jenis }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-select" aria-label="Default select example" name="status" id="status">
              <option value="Check In">Check In</option>
              <option value="Check Out">Check Out</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection