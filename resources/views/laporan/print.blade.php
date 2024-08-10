<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print</title>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'dist/css/adminlte.min.css') }}">
</head>
<body>
  <div class="container">
    <div id="kop">
      <div class="d-flex justify-content-between">
        <div style="width: 20%; text-align: right;">
          <img src="{{ asset(env('APP_PUBLIC').'img_puk/'. $laporan->dataPuk->logo_1) }}" alt="logo fspmi" style="width: 100px; height: 100px;">
        </div>
        <div style="width: 60%;">
          <hr style="border: 2px solid #333; margin: 0;">
          <div class="ml-3">
            <div class="font-weight-bold">Federasi Serikat Pekerja Metal Indonesia</div>
            <div class="font-weight-bold">Serikat Pekerja Elektronik Elektrik</div>
            <div class="font-weight-bold">Pimpinan Unit Kerja</div>
            <div class="font-weight-bold">{{ $laporan->puk }}</div>
          </div>
          <hr style="border: 2px solid #333; margin: 0;">
        </div>
        <div style="width: 20%;">
          <img src="{{ asset(env('APP_PUBLIC').'assets/logo-spee.png') }}" alt="logo spee" style="width: 100px; height: 100px;">
        </div>
      </div>
    </div>
    <div id="title" class="mb-3">
      <div class="row">
        <div class="col-6">
          <table style="width: 100%;">
            <tr>
              <td class="text-right">Ketua </td>
              <td>:</td>
              <td>{{ $laporan->dataPuk->ketua }}</td>
              <td><i class="fas fa-phone"></i> {{ $laporan->dataPuk->ketua_telp }}</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td colspan="2"><i class="fas fa-envelope"></i> {{ $laporan->dataPuk->ketua_email }}</td>
            </tr>
            <tr>
              <td class="text-right">Sekretaris </td>
              <td>:</td>
              <td>{{ $laporan->dataPuk->sekretaris }}</td>
              <td><i class="fas fa-phone"></i> {{ $laporan->dataPuk->sekretaris_telp }}</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td colspan="2"><i class="fas fa-envelope"></i> {{ $laporan->dataPuk->sekretaris_email }}</td>
            </tr>
          </table>
        </div>
        <div class="col-6">
          <div><i class="fas fa-industry"></i> {{ $laporan->alamat }}</div>
          <div><span><i class="fas fa-phone"></i> {{ $laporan->dataPuk->telp }}</span> <span><i class="fas fa-fax"></i> {{ $laporan->dataPuk->fax }}</span></div>
          <div><i class="fas fa-yen-sign"></i> {{ $laporan->dataPuk->bank }}: {{ $laporan->dataPuk->rekening_nomor }} - {{ $laporan->rekening_a_n }}</div>
        </div>
      </div>
    </div>
    <div id="header" class="mb-5">
      <h4 class="text-center my-5">LAPORAN PEMBAYARAN IURAN/CHECK OF SYSTEM (COS)</h4>
      <div>
        <div>Kepada Yth,</div>
        <div class="font-weight-bold">Dewan Pimpinan Pusat</div>
        <div class="font-weight-bold">Federasi Serikat Pekerja Metal Indonesia</div>
        <div>Jl. Raya Pondok Gede No. 11 Kp. Dukuh Jakarta Timur</div>
        <div>Telp: (021) 877 96919, (021) 70215934 Fax: (021) 841 3954</div>
      </div>
    </div>
    <div id="content" class="mb-5">
      <div class="mx-5">
        <table class="font-weight-bold" style="width: 100%;">
          <tr lc>
            <td class="pb-2">1.</td>
            <td class="pb-2">Nama PUK</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->dataPuk->nama }}</td>
          </tr>
          <tr>
            <td class="pb-2">2.</td>
            <td class="pb-2">Serikat Pekerja Anggota</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->jenis_produksi }}</td>
          </tr>
          <tr>
            <td class="pb-2">3.</td>
            <td class="pb-2">Alamat</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->alamat }}</td>
          </tr>
          <tr>
            <td class="pb-2" style="vertical-align: top;">4.</td>
            <td class="pb-2" style="vertical-align: top;">Jumlah Pekerja</td>
            <td class="pb-2" style="vertical-align: top;">:</td>
            <td class="pb-2">
              <table style="width: 100%;">
                <tr>
                  <td style="width: 40%;">Perempuan (P)</td>
                  <td>:</td>
                  <td class="text-right">{{ rupiah($laporan->jumlah_pekerja_perempuan) }} Orang</td>
                </tr>
                <tr>
                  <td style="width: 40%;">Laki - laki (L)</td>
                  <td>:</td>
                  <td class="text-right">{{ rupiah($laporan->jumlah_pekerja_laki) }} Orang</td>
                </tr>
                <tr>
                  <td style="width: 40%;">TOTAL</td>
                  <td>:</td>
                  <td class="text-right">{{ rupiah($laporan->jumlah_pekerja_total) }} Orang</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="pb-2" style="vertical-align: top;">5.</td>
            <td class="pb-2" style="vertical-align: top;">Jumlah Anggota</td>
            <td class="pb-2" style="vertical-align: top;">:</td>
            <td class="pb-2">
              <table style="width: 100%;">
                <tr>
                  <td style="width: 40%;">Perempuan (P)</td>
                  <td>:</td>
                  <td class="text-right">{{ rupiah($laporan->jumlah_anggota_perempuan) }} Orang</td>
                </tr>
                <tr>
                  <td style="width: 40%;">Laki - laki (L)</td>
                  <td>:</td>
                  <td class="text-right">{{ rupiah($laporan->jumlah_anggota_laki) }} Orang</td>
                </tr>
                <tr>
                  <td style="width: 40%;">TOTAL</td>
                  <td>:</td>
                  <td class="text-right">{{ rupiah($laporan->jumlah_anggota_total) }} Orang</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="pb-2">6.</td>
            <td class="pb-2">Besaran UPAH</td>
            <td class="pb-2">:</td>
            <td class="pb-2">Rp. {{ rupiah($laporan->besaran_upah) }}</td>
          </tr>
          <tr>
            <td class="pb-2">7.</td>
            <td class="pb-2">Kode COS</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->kode_cos }}</td>
          </tr>
          <tr>
            <td class="pb-2">8.</td>
            <td class="pb-2">Besar Iuran Perorang (1%)</td>
            <td class="pb-2">:</td>
            <td class="pb-2">Rp. {{ rupiah($laporan->besaran_iuran_per_orang) }}</td>
          </tr>
          <tr>
            <td class="pb-2">9.</td>
            <td class="pb-2">Jumlah Iuran Ke DPP (45%)</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->jumlah_iuran_dpp_persen }}% X Rp. {{ rupiah($laporan->jumlah_iuran_dpp) }}</td>
          </tr>
          <tr>
            <td class="pb-2"></td>
            <td class="pb-2"></td>
            <td class="pb-2">:</td>
            <td class="pb-2">Rp. {{ rupiah($laporan->jumlah_iuran_dpp_hasil) }}</td>
          </tr>
          <tr>
            <td class="pb-2">10.</td>
            <td class="pb-2">Periode Bulan</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ tglCarbon($laporan->periode, "d-m-Y") }}</td>
          </tr>
          <tr>
            <td class="pb-2">11.</td>
            <td class="pb-2">Jenis Setoran</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->jenis_setoran }}</td>
          </tr>
          <tr>
            <td class="pb-2">12.</td>
            <td class="pb-2">Rekening Atas Nama</td>
            <td class="pb-2">:</td>
            <td class="pb-2">{{ $laporan->rekening_a_n }}</td>
          </tr>
        </table>
      </div>
    </div>
    <div id="footer" class="pb-5">
      <div class="text-center font-weight-bold">
        <div class="pb-3">{{ $laporan->dataPuk->dataKabupaten->nama }}, {{ tglCarbon($laporan->created_at, 'd F Y') }}</div>
        <div>PIMPINAN UNIT KERJA</div>
        <div>SERIKAT PEKERJA ELEKTRONIK ELEKTRIK</div>
        <div>FEDERASI SERIKAT PEKERJA METAL INDONESIA</div>
        <div class="text-uppercase">{{ $laporan->puk }}</div>
      </div>
    </div>
    <div id="sign" class="mt-5">
      <div class="d-flex justify-content-center">
        <div class="mr-5 pr-5 font-weight-bold">{{ $laporan->dataPuk->ketua }}</div>
        <div class="ml-5 pl-5 font-weight-bold">{{ $laporan->dataPuk->sekretaris }}</div>
      </div>
      <div>
        <span>Tembusan: PP SPEE, PC SPEE, Arsip.</span>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset(env('APP_PUBLIC').'plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset(env('APP_PUBLIC').'plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset(env('APP_PUBLIC').'dist/js/adminlte.min.js') }}"></script>

  <script>
    window.print();
  </script>
</body>
</html>