@extends('layout')

@section('content')


@if ($errors->any())
<div class=" alert alert-danger alert-dismissible fade show col-10 my-2 mx-auto" role="alert">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card mb-4">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data kamar</div>
  <div class="card-body">
    <div class="table-responsive">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="row">
        <!-- Start kode untuk form pencarian -->
        <!-- Button trigger modal -->
        <div class="col-9">
          <button type="button" class="btn btn-dark mb-3 float-start" data-coreui-toggle="modal" data-coreui-target="#create">
            Tambah Data
          </button>
        </div>
        <div class="col-3">
          <form class="form" method="get" action="{{ route('searchKamar') }}">
            <div class="input-group mb-3">
              <input autocomplete="off" name="search" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Masukkan pencarian">
              <button class="input-group-text btn btn-dark" id="inputGroup-sizing-default"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>
      </div>

      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Kode Kamar</th>
            <th>No. Kamar</th>
            <th>Jenis Kamar</th>
            <th style="width: 100px;">Fasilitas</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kamar as $k)
          <tr>
            <!-- agar urutan angka sesuai paginate -->
            <td>{{ $kamar->firstItem() + $loop->index }}</td>
            <td><img src="{{ asset('images/'.$k->foto) }}" width="150px" height="100px"></td>
            <td>{{ $k->kd_kamar }}</td>
            <td>{{ $k->no_kamar }}</td>
            <td>{{ $k->jenis }}</td>
            <td>{{ $k->fasilitas }}</td>
            <td>Rp. {{ number_format($k->harga, 0, ',', '.') }}</td>
            <td>{{ $k->stok }}</td>
            <td>
              <form action="{{ route('kamar.destroy',$k->id_kamar) }}" method="POST">
                <a href="{{ route('kamar.show',$k->id_kamar) }}"><span class="badge bg-warning rounded-pill me-1"><i class="fa-solid fa-info"></i></span></a>
                <a href="{{ route('kamar.edit',$k->id_kamar) }}"><span class="badge bg-info rounded-pill"><i class="fa-solid fa-pen"></i></span></a>
                @csrf
                @method('DELETE')
                <button style="border: none; background-color: white;" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><span class="badge bg-danger rounded-pill"><i class="fa-solid fa-trash"></i></span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $kamar->links() }}
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="create" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Masukkan Data Kamar</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="kd_kamar">Kode Kamar</label>
            <input type="text" class="form-control" id="kd_kamar" name="kd_kamar" placeholder="Masukkan Kode Kamar">
          </div>
          <div class="form-group">
            <label for="no_kamar">No. Kamar</label>
            <input type="text" class="form-control" id="no_kamar" name="no_kamar" placeholder="Masukkan No. Kamar">
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Kamar</label>
            <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
              <option selected hidden disabled>Pilih Jenis Kamar</option>
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
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga">
          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok">
          </div>
          <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3" placeholder="Masukkan Fasilitas"></textarea>
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <p class="text-danger">*Usahakan foto berskala 1:1 atau berbentuk persegi</p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>




@endsection