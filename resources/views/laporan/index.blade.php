@extends('app')
@section('title') Laporan @endsection
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
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan</li>
          </ol>
        </div><!-- /.col -->
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="h5">Data Laporan</div>
                <div><a href="{{ route('laporan.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>
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
                            <a href="{{ route('laporan.print', [$laporan->id]) }}" target="_blank" class="dropdown-item border-bottom">
                              <i class="fas fa-print text-center mr-2" style="width: 20px;"></i> Print
                            </a>
                            <a href="{{ route('laporan.show', [$laporan->id]) }}" class="dropdown-item border-bottom">
                              <i class="fas fa-eye text-center mr-2" style="width: 20px;"></i> Detail
                            </a>
                            <a href="{{ route('laporan.edit', [$laporan->id]) }}" class="dropdown-item border-bottom">
                              <i class="fas fa-pencil-alt text-center mr-2" style="width: 20px;"></i> Ubah
                            </a>
                            <a href="{{ route('laporan.delete', [$laporan->id]) }}" class="dropdown-item" onclick="return confirm('Yakin akan dihapus?')">
                              <i class="fas fa-trash-alt text-center mr-2" style="width: 20px;"></i> Hapus
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
  <!-- /.content -->
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