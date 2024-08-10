<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisProduksi;
use App\Models\Laporan;
use App\Models\Puk;

class LaporanController extends Controller
{
  public function index()
  {
    $laporans = Laporan::get();

    return view('laporan.index', ['laporans' => $laporans]);
  }

  public function create()
  {
    $puks = Puk::get();

    return view('laporan.create', ['puks' => $puks]);
  }

  public function dataPuk($id)
  {
    $puk = Puk::find($id);
    $jenisProduksi = JenisProduksi::find($puk->jenis_produksi_id);

    return response()->json([
      'puk' => $puk,
      'jenisProduksi' => $jenisProduksi
    ]);
  }

  public function store(Request $request)
  {
    $puk = Puk::find($request->puk_id);

    $laporan = new Laporan;
    $laporan->puk_id = $request->puk_id;
    $laporan->puk = $puk->nama;
    $laporan->jenis_produksi = $request->jenis_produksi;
    $laporan->alamat = $request->alamat;
    $laporan->jumlah_pekerja_perempuan = str_replace(".","", $request->jumlah_pekerja_perempuan);
    $laporan->jumlah_pekerja_laki = str_replace(".","", $request->jumlah_pekerja_laki);
    $laporan->jumlah_pekerja_total = str_replace(".","", $request->jumlah_pekerja_total);
    $laporan->jumlah_anggota_perempuan = str_replace(".","", $request->jumlah_anggota_perempuan);
    $laporan->jumlah_anggota_laki = str_replace(".","", $request->jumlah_anggota_laki);
    $laporan->jumlah_anggota_total = str_replace(".","", $request->jumlah_anggota_total);
    $laporan->besaran_upah = str_replace(".","", $request->besaran_upah);
    $laporan->kode_cos = $request->kode_cos;
    $laporan->besaran_iuran_per_orang = str_replace(".","", $request->besaran_iuran_per_orang);
    $laporan->jumlah_iuran_dpp = str_replace(".","", $request->jumlah_iuran_dpp);
    $laporan->jumlah_iuran_dpp_persen = $request->jumlah_iuran_dpp_persen;
    $laporan->jumlah_iuran_dpp_hasil = str_replace(".","", $request->jumlah_iuran_dpp_hasil);
    $laporan->periode = $request->periode;
    $laporan->jenis_setoran = $request->jenis_setoran;
    $laporan->rekening_a_n = $request->rekening_a_n;
    $laporan->save();

    return redirect()->route('laporan')->with('message', 'Data berhasil disimpan');
  }

  public function show($id)
  {
    $laporan = Laporan::find($id);

    return view('laporan.show', ['laporan' => $laporan]);
  }

  public function print($id)
  {
    $laporan = Laporan::find($id);

    return view('laporan.print', ['laporan' => $laporan]);
  }

  public function edit($id)
  {
    $laporan = Laporan::find($id);
    $puks = Puk::get();

    return view('laporan.edit', ['laporan' => $laporan, 'puks' => $puks]);
  }

  public function update(Request $request, $id)
  {
    $puk = Puk::find($request->puk_id);

    $laporan = Laporan::find($id);
    $laporan->puk_id = $request->puk_id;
    $laporan->puk = $puk->nama;
    $laporan->jenis_produksi = $request->jenis_produksi;
    $laporan->alamat = $request->alamat;
    $laporan->jumlah_pekerja_perempuan = str_replace(".","", $request->jumlah_pekerja_perempuan);
    $laporan->jumlah_pekerja_laki = str_replace(".","", $request->jumlah_pekerja_laki);
    $laporan->jumlah_pekerja_total = str_replace(".","", $request->jumlah_pekerja_total);
    $laporan->jumlah_anggota_perempuan = str_replace(".","", $request->jumlah_anggota_perempuan);
    $laporan->jumlah_anggota_laki = str_replace(".","", $request->jumlah_anggota_laki);
    $laporan->jumlah_anggota_total = str_replace(".","", $request->jumlah_anggota_total);
    $laporan->besaran_upah = str_replace(".","", $request->besaran_upah);
    $laporan->kode_cos = $request->kode_cos;
    $laporan->besaran_iuran_per_orang = str_replace(".","", $request->besaran_iuran_per_orang);
    $laporan->jumlah_iuran_dpp = str_replace(".","", $request->jumlah_iuran_dpp);
    $laporan->jumlah_iuran_dpp_persen = $request->jumlah_iuran_dpp_persen;
    $laporan->jumlah_iuran_dpp_hasil = str_replace(".","", $request->jumlah_iuran_dpp_hasil);
    $laporan->periode = $request->periode;
    $laporan->jenis_setoran = $request->jenis_setoran;
    $laporan->rekening_a_n = $request->rekening_a_n;
    $laporan->save();

    return redirect()->route('laporan')->with('message', 'Data berhasil diperbaharui');
  }

  public function delete($id)
  {
    $laporan = Laporan::find($id);
    $laporan->delete();

    return redirect()->route('laporan')->with('message', 'Data berhasil dihapus');
  }
}
