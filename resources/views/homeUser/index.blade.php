@extends('app')
@section('title') Dashboard @endsection
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="card card-info">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama PUK</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $puk->nama }}" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $puk->dataUser ? $puk->dataUser->email : '' }}" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $puk->alamat }}" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="card card-info">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Sektor</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $puk->dataJenisProduksi ? $puk->dataJenisProduksi->nama : '' }}" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Ketua</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $puk->ketua }}" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Sekretaris</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $puk->sekretaris }}" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div class="h5">Data Laporan</div>
                    <div><a href="{{ route('home.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>
                  </div>
                </div>
                <div class="card-body">
                  <table id="tabel_laporan" class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">PUK</th>
                        <th class="text-center">Jenis Produksi</th>
                        <th class="text-center">Kode COS</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($laporans as $key => $laporan)
                        <tr>
                          <td class="text-center">{{ $key + 1 }}</td>
                          <td>{{ $laporan->puk }}</td>
                          <td>{{ $laporan->jenis_produksi }}</td>
                          <td class="text-center">{{ $laporan->kode_cos }}</td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle btn bg-gradient-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('home.show', [$laporan->id]) }}" class="dropdown-item border-bottom">
                                  <i class="fas fa-eye text-center mr-2" style="width: 20px;"></i> Detail
                                </a>
                                <a href="{{ route('home.edit', [$laporan->id]) }}" class="dropdown-item border-bottom">
                                  <i class="fas fa-pencil-alt text-center mr-2" style="width: 20px;"></i> Ubah
                                </a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset(env('APP_PUBLIC').'plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset(env('APP_PUBLIC').'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset(env('APP_PUBLIC').'plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset(env('APP_PUBLIC').'plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
  $(function () {
    $("#tabel_laporan").DataTable();
  });
</script>
@endsection