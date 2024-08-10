@extends('app')
@section('title') Tambah PUK @endsection
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah PUK</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('puk') }}">PUK</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('puk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="nama">Nama PUK</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" placeholder="Nama PUK" autofocus required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="kode_cos">Kode COS</label>
                    <input type="text" name="kode_cos" id="kode_cos" class="form-control" value="{{ old('kode_cos') }}" placeholder="Kode COS" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="jenis_produksi_id">Jenis Sektor</label>
                    <select name="jenis_produksi_id" id="jenis_produksi_id" class="form-control" required>
                      <option value="">Pilih Jenis Sektor</option>
                      @foreach ($jenisProduksis as $jenisProduksi)
                        <option value="{{ $jenisProduksi->id }}" {{ $jenisProduksi->id == old('jenis_produksi_id') ? 'selected' : '' }}>{{ $jenisProduksi->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-12 col-12 mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="4" class="form-control" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="kabupaten_id">Kabupaten / Kota</label>
                    <select name="kabupaten_id" id="kabupaten_id" class="form-control" required>
                      <option value="">Pilih Kabupaten / Kota</option>
                      @foreach ($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->id }}" {{ $kabupaten->id == old('kabupaten') ? 'selected' : '' }}>{{ $kabupaten->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="kecamatan_id">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                      <option value="">Pilih Kecamatan</option>
                      @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == old('kecamatan') ? 'selected' : '' }}>{{ $kecamatan->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" name="kode_pos" id="kode_pos" class="form-control" value="{{ old('kode_pos') }}" placeholder="Kode Pos">
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="ketua">Nama Ketua</label>
                    <input type="text" name="ketua" id="ketua" class="form-control" value="{{ old('ketua') }}" placeholder="Nama Ketua" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="ketua_telp">Nomor Telepon Ketua</label>
                    <input type="text" name="ketua_telp" id="ketua_telp" class="form-control" value="{{ old('ketua_telp') }}" placeholder="Nomor Telepon Ketua" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="ketua_email">Email Ketua</label>
                    <input type="text" name="ketua_email" id="ketua_email" class="form-control" value="{{ old('ketua_email') }}" placeholder="Email Ketua" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="sekretaris">Nama Sekretaris</label>
                    <input type="text" name="sekretaris" id="sekretaris" class="form-control" value="{{ old('sekretaris') }}" placeholder="Nama Sekretaris" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="sekretaris_telp">Nomor Telepon Sekretaris</label>
                    <input type="text" name="sekretaris_telp" id="sekretaris_telp" class="form-control" value="{{ old('sekretaris_telp') }}" placeholder="Nomor Telepon Sekretaris" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="sekretaris_email">Email Sekretaris</label>
                    <input type="text" name="sekretaris_email" id="sekretaris_email" class="form-control" value="{{ old('sekretaris_email') }}" placeholder="Email Sekretaris" required>
                  </div>
                  <div class="col-lg-3 col-12 mb-3">
                    <label for="telp">Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control" value="{{ old('telp') }}" placeholder="Telepon" required>
                  </div>
                  <div class="col-lg-3 col-12 mb-3">
                    <label for="fax">Fax</label>
                    <input type="text" name="fax" id="fax" class="form-control" value="{{ old('fax') }}" placeholder="Fax" required>
                  </div>
                  <div class="col-lg-3 col-12 mb-3">
                    <label for="logo_1">Logo 1</label>
                    <input type="file" name="logo_1" id="logo_1" class="form-control" placeholder="Logo" required>
                  </div>
                  <div class="col-lg-3 col-12 mb-3">
                    <label for="logo_2">Logo 2</label>
                    <input type="file" name="logo_2" id="logo_2" class="form-control" placeholder="Logo" required>
                  </div>
                  <div class="col-lg-6 col-12 mb-3">
                    <label for="email">Email Login</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email Login" required>
                    @error('email')
                      <span class="text-danger font-italic">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-12 mb-3">
                    <label for="password">Password Login</label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Password Login" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="bank">Bank</label>
                    <input type="text" name="bank" id="bank" class="form-control" value="{{ old('bank') }}" placeholder="Bank" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="rekening_nomor">Nomor Rekening</label>
                    <input type="text" name="rekening_nomor" id="rekening_nomor" class="form-control" value="{{ old('rekening_nomor') }}" placeholder="Nomor Rekening" required>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                    <label for="rekening_a_n">Rekening Atas Nama</label>
                    <input type="text" name="rekening_a_n" id="rekening_a_n" class="form-control" value="{{ old('rekening_a_n') }}" placeholder="Rekening Atas Nama" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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