<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisProduksi;

class JenisProduksiController extends Controller
{
  public function index()
  {
    $jenisProduksis = JenisProduksi::get();

    return view('jenisProduksi.index', ['jenisProduksis' => $jenisProduksis]);
  }

  public function create()
  {
    return view('jenisProduksi.create');
  }

  public function store(Request $requst)
  {
    $jenisProduksi = new JenisProduksi;
    $jenisProduksi->nama = $requst->nama;
    $jenisProduksi->save();

    return redirect()->route('jenisProduksi')->with('message', 'Data berhasil disimpan');
  }

  public function edit($id)
  {
    $jenisProduksi = JenisProduksi::find($id);

    return view('jenisProduksi.edit', ['jenisProduksi' => $jenisProduksi]);
  }

  public function update(Request $requst, $id)
  {
    $jenisProduksi = JenisProduksi::find($id);
    $jenisProduksi->nama = $requst->nama;
    $jenisProduksi->save();

    return redirect()->route('jenisProduksi')->with('message', 'Data berhasil diperbaharui');
  }

  public function delete($id)
  {
    $jenisProduksi = JenisProduksi::find($id);
    $jenisProduksi->delete();

    return redirect()->route('jenisProduksi')->with('message', 'Data berhasil dihapus');
  }
}
