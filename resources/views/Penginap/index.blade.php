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
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data Penginapan</div>
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
          <form class="form" method="get" action="{{ route('searchPenginap') }}">
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
            <th>Nama</th>
            <th>Tanggal Check In</th>
            <th>Tanggal Check Out</th>
            <th>Lama Menginap</th>
            <th>Jenis Kamar</th>
            <th>Jumlah</th>
            <th>Diskon</th>
            <th>Pajak</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($penginap as $p)
          <tr>
            <td>{{ $penginap->firstItem() + $loop->index }}</td>
            <td>{{ $p->nm_penginap }}</td>
            <td>{{ $p->tgl_masuk }}</td>
            <td>{{ $p->tgl_keluar }}</td>
            <td>{{ $p->lama_inap }} Hari</td>
            <td>{{ $p->jenis }}</td>
            <td>{{ $p->jumlah }}</td>
            <td>Rp. {{ number_format($p->diskon, 0, ',', '.') }}</td>
            <td>Rp. {{ number_format($p->pajak, 0, ',', '.') }}</td>
            <td>Rp. {{ number_format($p->total, 0, ',', '.') }}</td>
            <td>
              <form action="{{ route('penginap.destroy',$p->id_penginap) }}" method="POST">
                <a href="{{ route('penginap.edit',$p->id_penginap) }}"><span class="badge bg-info rounded-pill"><i class="fa-solid fa-pen"></i></span></a>
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background-color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><span class="badge bg-danger rounded-pill"><i class="fa-solid fa-trash"></i></span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $penginap->links() }}
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="create" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLabel">Tambah Data Penginap</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert fade alert-primary alert-dismissible fade show" tabindex="-1" aria-hidden="true" role="alert">
          <strong>Hai Admin!</strong> Jika jumlah kamar lebih dari 3 otomatis akan mendapatkan diskon 2.5%!
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="{{ route('penginap.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="tgl_masuk">Tanggal Checkin</label>
            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Tanggal Checkin">
          </div>
          <div class="form-group">
            <label for="tgl_keluar">Tanggal Checkout</label>
            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" placeholder="Tanggal Checkout">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nm_penginap" placeholder="Nama">
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