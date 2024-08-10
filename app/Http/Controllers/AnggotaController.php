<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
  public function index()
  {
    $anggotas = Anggota::get();

    return view('anggota.index', ['anggotas' => $anggotas]);
  }

  public function create()
  {
    return view('anggota.create');
  }

  public function store(Request $requst)
  {
    $anggota = new Anggota;
    $anggota->nama = $requst->nama;
    $anggota->save();

    return redirect()->route('anggota')->with('message', 'Data berhasil disimpan');
  }

  public function edit($id)
  {
    $anggota = Anggota::find($id);

    return view('anggota.edit', ['anggota' => $anggota]);
  }

  public function update(Request $requst, $id)
  {
    $anggota = Anggota::find($id);
    $anggota->nama = $requst->nama;
    $anggota->save();

    return redirect()->route('anggota')->with('message', 'Data berhasil diperbaharui');
  }

  public function delete($id)
  {
    $anggota = Anggota::find($id);
    $anggota->delete();

    return redirect()->route('anggota')->with('message', 'Data berhasil dihapus');
  }
}
