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

<!-- halaman reservasi -->
<div class="card mb-4">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data Reservasi</div>
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
          <form class="form" method="get" action="{{ route('searchReservasi') }}">
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
            <th>Tanggal Reservasi</th>
            <th>Nama</th>
            <th>Jenis Kamar</th>
            <th>Jumlah</th>
            <th>Diskon</th>
            <th>Pajak</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservasi as $r)
          <tr>
            <td>{{ $reservasi->firstItem() + $loop->index }}</td>
            <td>{{ $r->tgl_reservasi }}</td>
            <td>{{ $r->nm_customer }}</td>
            <td>{{ $r->jenis }}</td>
            <td>{{ $r->jumlah }}</td>
            <td>Rp. {{ number_format($r->diskon, 0, ',', '.') }}</td>
            <td>Rp. {{ number_format($r->pajak, 0, ',', '.') }}</td>
            <td>Rp. {{ number_format($r->total, 0, ',', '.') }}</td>
            <td>
              <form action="{{ route('reservasi.destroy',$r->id_reservasi) }}" method="POST">
                <a href="{{ route('reservasi.edit',$r->id_reservasi) }}"><span class="badge bg-info rounded-pill"><i class="fa-solid fa-pen"></i></span></a>
                @csrf
                @method('DELETE')
                <button style="border: none; background-color: white;" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><span class="badge bg-danger rounded-pill"><i class="fa-solid fa-trash"></i></span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $reservasi->links() }}
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="create" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLabel">Tambah Data Reservasi</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert fade alert-primary alert-dismissible fade show" tabindex="-1" aria-hidden="true" role="alert">
          <strong>Hai Admin!</strong> Jika jumlah kamar lebih dari 3 otomatis akan mendapatkan diskon 2.5%!
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="{{ route('reservasi.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="tgl_reservasi">Tanggal Reservasi</label>
            <input type="date" class="form-control" id="tgl_reservasi" name="tgl_reservasi" placeholder="Tanggal Reservasi">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nm_customer" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Kamar</label>
            <select class="form-select" aria-label="Default select example" name="kd_kamar">
              <!-- menampilkan jenis kamar dari database kamar -->
              @foreach ($kamar as $k)
              <option value="{{ $k->id_kamar }}">{{ $k->jenis }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
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