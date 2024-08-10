@extends('app')
@section('title') Ubah Jenis Produksi @endsection
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Jenis Produksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jenisProduksi') }}">Jenis Produksi</a></li>
            <li class="breadcrumb-item active">Ubah</li>
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
            <div class="card-body">
              <form action="{{ route('jenisProduksi.update', [$jenisProduksi->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <div class="col">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $jenisProduksi->nama }}" placeholder="Nama Jenis Produksi" autofocus>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Perbaharui</button>
                  </div>
                </div>
              </form>
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
@endsection