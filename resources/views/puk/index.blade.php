@extends('app')
@section('title') PUK @endsection
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
          <h1 class="m-0">PUK</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">PUK</li>
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
                <div class="h5">Data PUK</div>
                <div><a href="{{ route('puk.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>
              </div>
            </div>
            <div class="card-body">
              <table id="tabel_puk" class="table table-bordered table-stripped">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Jenis Sektor</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($puks as $key => $puk)
                    <tr>
                      <td class="text-center">{{ $key + 1 }}</td>
                      <td>{{ $puk->nama }}</td>
                      <td class="text-right">
                        @if ($puk->dataUser)
                          {{ $puk->dataUser->email }}
                        @endif
                      </td>
                      <td>
                        @if ($puk->dataJenisProduksi)
                          {{ $puk->dataJenisProduksi->nama }}
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="#" class="dropdown-toggle btn bg-gradient-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('puk.edit', [$puk->id]) }}" class="dropdown-item border-bottom">
                              <i class="fas fa-pencil-alt text-center mr-2" style="width: 20px;"></i> Ubah
                            </a>
                            <a href="{{ route('puk.delete', [$puk->id]) }}" class="dropdown-item" onclick="return confirm('Yakin akan dihapus?')">
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
    $("#tabel_puk").DataTable();
  });
</script>
@endsection