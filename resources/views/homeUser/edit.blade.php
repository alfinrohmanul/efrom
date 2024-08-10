@extends('app')
@section('title') Ubah Laporan @endsection
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
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
              <div class="row">
                <div class="col">
                  <form action="{{ route('home.update', [$laporan->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table style="width: 100%;">
                      <tr>
                        <td>Nama PUK</td>
                        <td>:</td>
                        <td>
                          <select name="puk_id" id="puk_id" class="form-control" required>
                            <option value="">Pilih PUK</option>
                            @foreach ($puks as $puk)
                              <option value="{{ $puk->id }}" {{ $puk->id == $laporan->puk_id ? 'selected' : '' }}>{{ $puk->nama }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Serikat Pekerja Anggota</td>
                        <td>:</td>
                        <td>
                          <input type="text" name="jenis_produksi" id="jenis_produksi" class="form-control" value="{{ $laporan->jenis_produksi }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align: top">Alamat</td>
                        <td style="vertical-align: top">:</td>
                        <td>
                          <textarea name="alamat" id="alamat" class="form-control" required>{{ $laporan->alamat }}</textarea>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align: top;">Jumlah Pekerja</td>
                        <td style="vertical-align: top;">:</td>
                        <td>
                          <div class="d-flex justify-content-between mb-1">
                            <div>Perempuan</div>
                            <div><input type="text" name="jumlah_pekerja_perempuan" id="jumlah_pekerja_perempuan" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_pekerja_perempuan) }}"></div>
                          </div>
                          <div class="d-flex justify-content-between mb-1">
                            <div>Laki - laki</div>
                            <div><input type="text" name="jumlah_pekerja_laki" id="jumlah_pekerja_laki" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_pekerja_laki) }}"></div>
                          </div>
                          <div class="d-flex justify-content-end mb-1">
                            <button id="jumlah_pekerja_btn" class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
                          </div>
                          <div class="d-flex justify-content-between mb-1">
                            <div>Total</div>
                            <div><input type="text" name="jumlah_pekerja_total" id="jumlah_pekerja_total" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_pekerja_total) }}" required></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align: top">Jumlah Anggota</td>
                        <td style="vertical-align: top">:</td>
                        <td>
                          <div class="d-flex justify-content-between mb-1">
                            <div>Perempuan</div>
                            <div><input type="text" name="jumlah_anggota_perempuan" id="jumlah_anggota_perempuan" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_anggota_perempuan) }}"></div>
                          </div>
                          <div class="d-flex justify-content-between mb-1">
                            <div>Laki - laki</div>
                            <div><input type="text" name="jumlah_anggota_laki" id="jumlah_anggota_laki" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_anggota_laki) }}"></div>
                          </div>
                          <div class="d-flex justify-content-end mb-1">
                            <button id="jumlah_anggota_btn" class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
                          </div>
                          <div class="d-flex justify-content-between mb-1">
                            <div>Total</div>
                            <div><input type="text" name="jumlah_anggota_total" id="jumlah_anggota_total" class="form-control" style="text-align: right;" value="{{ rupiah($laporan->jumlah_anggota_total) }}" required></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Besaran UPAH</td>
                        <td>:</td>
                        <td>
                          <input type="text" name="besaran_upah" id="besaran_upah" class="form-control" value="{{ rupiah($laporan->besaran_upah) }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>Kode COS</td>
                        <td>:</td>
                        <td>
                          <input type="text" name="kode_cos" id="kode_cos" class="form-control" value="{{ $laporan->kode_cos }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>Besaran Iuran Per Orang (1%)</td>
                        <td>:</td>
                        <td>
                          <input type="text" name="besaran_iuran_per_orang" id="besaran_iuran_per_orang" class="form-control" value="{{ rupiah($laporan->besaran_iuran_per_orang) }}"  required>
                        </td>
                      </tr>
                      <tr>
                        <td>Jumlah Iuran Ke DPP (45%)</td>
                        <td>:</td>
                        <td>
                          <div class="d-flex justify-content-between">
                            <div><input type="text" name="jumlah_iuran_dpp" id="jumlah_iuran_dpp" class="form-control" value="{{ rupiah($laporan->jumlah_iuran_dpp) }}" required></div>
                            <div class="d-flex align-items-center"><input type="text" name="jumlah_iuran_dpp_persen" id="jumlah_iuran_dpp_persen" style="text-align: right; border: none;" size="1" value="45">%</div>
                            <div><input type="text" name="jumlah_iuran_dpp_hasil" id="jumlah_iuran_dpp_hasil" class="form-control" value="{{ rupiah($laporan->jumlah_iuran_dpp_hasil) }}" required></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Periode Bulan</td>
                        <td>:</td>
                        <td><input type="date" name="periode" id="periode" class="form-control" value="{{ tglCarbon($laporan->periode, 'Y-m-d') }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>Jenis Setoran</td>
                        <td>:</td>
                        <td><input type="text" name="jenis_setoran" id="jenis_setoran" class="form-control" value="{{ $laporan->jenis_setoran }}" required></td>
                      </tr>
                      <tr>
                        <td>Rekening Atas Nama</td>
                        <td>:</td>
                        <td>
                          <input type="text" name="rekening_a_n" id="rekening_a_n" class="form-control" value="{{ $laporan->rekening_a_n }}" required>
                        </td>
                      </tr>
                    </table>
                    <div class="row">
                      <div class="col text-right">
                        <button id="btn_submit" class="btn btn-primary mt-3"><i class="fas fa-paper-plane"></i> Perbaharui</button>
                      </div>
                    </div>
                  </form>
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
<script>
  $(document).ready(function() {
    $('#puk_id').on('change', function() {
      $('#alamat').empty();
      const id = $(this).val();
      let url = "{{ route('laporan.dataPuk', ':id') }}";
      url = url.replace(':id', id);

      $.ajax({
        url: url,
        type: "get",
        success: function(response) {
          $('#jenis_produksi').val(response.jenisProduksi.nama);
          $('#alamat').append(response.puk.alamat);
          $('#kode_cos').val(response.puk.kode_cos);
        }
      })
    })

    // total pekerja
    const jumlah_pekerja_btn = $('#jumlah_pekerja_btn');

    let jumlah_pekerja_perempuan = document.getElementById("jumlah_pekerja_perempuan");
    jumlah_pekerja_perempuan.addEventListener("keyup", function(e) {
      jumlah_pekerja_perempuan.value = rupiahJsKeyup(this.value, "");
    });

    let jumlah_pekerja_laki = document.getElementById("jumlah_pekerja_laki");
    jumlah_pekerja_laki.addEventListener("keyup", function(e) {
      jumlah_pekerja_laki.value = rupiahJsKeyup(this.value, "");
    });

    let jumlah_pekerja_total = document.getElementById("jumlah_pekerja_total");
    jumlah_pekerja_total.addEventListener("keyup", function(e) {
      jumlah_pekerja_total.value = rupiahJsKeyup(this.value, "");
    });

    jumlah_pekerja_btn.on('click', function (e) {
      e.preventDefault();
      const perempuan = $('#jumlah_pekerja_perempuan').val().replace(/\./g,"");
      const laki = $('#jumlah_pekerja_laki').val().replace(/\./g,"");
      const calTotal = Number(perempuan) + Number(laki);
      $('#jumlah_pekerja_total').val(rupiahJs(calTotal));
    })

    // total anggota
    const jumlah_anggota_btn = $('#jumlah_anggota_btn');

    let jumlah_anggota_perempuan = document.getElementById("jumlah_anggota_perempuan");
    jumlah_anggota_perempuan.addEventListener("keyup", function(e) {
      jumlah_anggota_perempuan.value = rupiahJsKeyup(this.value, "");
    });

    let jumlah_anggota_laki = document.getElementById("jumlah_anggota_laki");
    jumlah_anggota_laki.addEventListener("keyup", function(e) {
      jumlah_anggota_laki.value = rupiahJsKeyup(this.value, "");
    });

    let jumlah_anggota_total = document.getElementById("jumlah_anggota_total");
    jumlah_anggota_total.addEventListener("keyup", function(e) {
      const val = $(this).val().replace(/\./g,"");
      // jumlah iuran dpp
      const val_besaran_upah = $('#besaran_upah').val().replace(/\./g,"");
      const calBesaranIuranDpp = Number(val) * Number(val_besaran_upah);
      $('#jumlah_iuran_dpp').val(rupiahJs(calBesaranIuranDpp));
      // jumlah iuran dpp hasil
      const besaranIuranDpp = calBesaranIuranDpp * 0.45;
      $('#jumlah_iuran_dpp_hasil').val(rupiahJs(besaranIuranDpp));

      jumlah_anggota_total.value = rupiahJsKeyup(this.value, "");
    });

    jumlah_anggota_btn.on('click', function (e) {
      e.preventDefault();
      const perempuan = $('#jumlah_anggota_perempuan').val().replace(/\./g,"");
      const laki = $('#jumlah_anggota_laki').val().replace(/\./g,"");
      const calTotal = Number(perempuan) + Number(laki);
      $('#jumlah_anggota_total').val(rupiahJs(calTotal));

      // jumlah iuran dpp
      const val_besaran_upah = $('#besaran_upah').val().replace(/\./g,"");
      const calBesaranIuranDpp = Number(calTotal) * Number(val_besaran_upah);
      $('#jumlah_iuran_dpp').val(rupiahJs(calBesaranIuranDpp));
      // jumlah iuran dpp hasil
      const besaranIuranDpp = calBesaranIuranDpp * 0.45;
      $('#jumlah_iuran_dpp_hasil').val(rupiahJs(besaranIuranDpp));
    })

    // besaran upah
    let besaran_upah = document.getElementById("besaran_upah");
    besaran_upah.addEventListener("keyup", function(e) {
      const val = $(this).val().replace(/\./g,"");
      // besaran iuran per orang
      const calVal = Number(val) * 0.01;
      $('#besaran_iuran_per_orang').val(rupiahJs(Math.round(calVal)));
      // jumlah iuran dpp
      const val_jumlah_anggota = $('#jumlah_anggota_total').val().replace(/\./g,"");
      const calBesaranIuranDpp = Number(val) * Number(val_jumlah_anggota);
      $('#jumlah_iuran_dpp').val(rupiahJs(calBesaranIuranDpp));
      // jumlah iuran dpp hasil
      const besaranIuranDpp = calBesaranIuranDpp * 0.45;
      $('#jumlah_iuran_dpp_hasil').val(rupiahJs(besaranIuranDpp));

      besaran_upah.value = rupiahJsKeyup(this.value, "");
    });
  })
</script>
@endsection