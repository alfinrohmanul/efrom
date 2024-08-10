@extends('app')
@section('title') Tambah Laporan @endsection
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail</li>
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
              <div class="row">
                <div class="col">
                  <table style="width: 100%;">
                    <tr>
                      <td>Nama PUK</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="puk_id" id="puk_id" class="form-control" value="{{ $laporan->dataPuk->nama }}" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>Serikat Pekerja Anggota</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="jenis_produksi" id="jenis_produksi" class="form-control" value="{{ $laporan->jenis_produksi }}" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top">Alamat</td>
                      <td style="vertical-align: top">:</td>
                      <td>
                        <textarea name="alamat" id="alamat" class="form-control" readonly>{{ $laporan->alamat }}</textarea>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;">Jumlah Pekerja</td>
                      <td style="vertical-align: top;">:</td>
                      <td>
                        <div class="d-flex justify-content-between mb-1">
                          <div>Perempuan</div>
                          <div>
                            <input type="text" name="jumlah_pekerja_perempuan" id="jumlah_pekerja_perempuan" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_pekerja_perempuan) }}" readonly>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                          <div>Laki - laki</div>
                          <div>
                            <input type="text" name="jumlah_pekerja_laki" id="jumlah_pekerja_laki" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_pekerja_laki) }}" readonly>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                          <div>Total</div>
                          <div>
                            <input type="text" name="jumlah_pekerja_total" id="jumlah_pekerja_total" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_pekerja_total) }}" readonly>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top">Jumlah Anggota</td>
                      <td style="vertical-align: top">:</td>
                      <td>
                        <div class="d-flex justify-content-between mb-1">
                          <div>Perempuan</div>
                          <div>
                            <input type="text" name="jumlah_anggota_perempuan" id="jumlah_anggota_perempuan" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_anggota_perempuan) }}" readonly>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                          <div>Laki - laki</div>
                          <div>
                            <input type="text" name="jumlah_anggota_laki" id="jumlah_anggota_laki" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_anggota_laki) }}" readonly>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                          <div>Total</div>
                          <div>
                            <input type="text" name="jumlah_anggota_total" id="jumlah_anggota_total" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_anggota_total) }}" readonly>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Besaran UPAH</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="besaran_upah" id="besaran_upah" class="form-control" value="{{ rupiah($laporan->besaran_upah) }}" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>Kode COS</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="kode_cos" id="kode_cos" class="form-control" value="{{ $laporan->kode_cos }}" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>Besaran Iuran Per Orang (1%)</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="besaran_iuran_per_orang" id="besaran_iuran_per_orang" class="form-control" value="{{ rupiah($laporan->besaran_iuran_per_orang) }}" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>Jumlah Iuran Ke DPP (45%)</td>
                      <td>:</td>
                      <td>
                        <div class="d-flex justify-content-between">
                          <div>
                            <input type="text" name="jumlah_iuran_dpp" id="jumlah_iuran_dpp" class="form-control" value="{{ rupiah($laporan->jumlah_iuran_dpp) }}" readonly>
                          </div>
                          <div class="d-flex align-items-center">
                            <input type="text" name="jumlah_iuran_dpp_persen" id="jumlah_iuran_dpp_persen" style="text-align: right; border: none;" size="1" value="45">%
                          </div>
                          <div>
                            <input type="text" name="jumlah_iuran_dpp_hasil" id="jumlah_iuran_dpp_hasil" class="form-control" value="{{ rupiah($laporan->jumlah_iuran_dpp_hasil) }}" readonly>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Periode Bulan</td>
                      <td>:</td>
                      <td><input type="date" name="periode" id="periode" class="form-control" value="{{ tglCarbon($laporan->periode, "Y-m-d") }}">
                      </td>
                    </tr>
                    <tr>
                      <td>Jenis Setoran</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="jenis_setoran" id="jenis_setoran" class="form-control" value="{{ $laporan->jenis_setoran }}" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>Rekening Atas Nama</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="rekening_a_n" id="rekening_a_n" class="form-control" value="{{ $laporan->rekening_a_n }}" readonly>
                      </td>
                    </tr>
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
@endsection