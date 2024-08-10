<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\JenisProduksi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Puk;
use App\Models\User;

class PukController extends Controller
{
  public function index()
  {
    $puks = Puk::get();

    return view('puk.index', ['puks' => $puks]);
  }

  public function create()
  {
    $jenisProduksis = JenisProduksi::get();
    $kabupatens = Kabupaten::get();
    $kecamatans = Kecamatan::get();

    return view('puk.create', [
      'jenisProduksis' => $jenisProduksis,
      'kabupatens' => $kabupatens,
      'kecamatans' => $kecamatans
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|email|unique:users'
    ], [
      'email.unique' => 'Email sudah digunakan.'
    ]);

    $puk = new Puk;
    $puk->nama = $request->nama;
    $puk->alamat = $request->alamat;
    $puk->kabupaten_id = $request->kabupaten_id;
    $puk->kecamatan_id = $request->kecamatan_id;
    $puk->kode_pos = $request->kode_pos;
    $puk->kode_cos = $request->kode_cos;
    $puk->jenis_produksi_id = $request->jenis_produksi_id;
    $puk->ketua = $request->ketua;
    $puk->ketua_telp = $request->ketua_telp;
    $puk->ketua_email = $request->ketua_email;
    $puk->sekretaris = $request->sekretaris;
    $puk->sekretaris_telp = $request->sekretaris_telp;
    $puk->sekretaris_email = $request->sekretaris_email;
    $puk->telp = $request->telp;
    $puk->fax = $request->fax;
    $puk->bank = $request->bank;
    $puk->rekening_nomor = $request->rekening_nomor;
    $puk->rekening_a_n = $request->rekening_a_n;

    // logo 1
    if($request->hasFile('logo_1')) {
      $file = $request->file('logo_1');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "1." . $extension;
      $file->move(env('APP_PUBLIC') . 'img_puk/', $filename);
      $puk->logo_1 = $filename;
    }
    // logo 2
    if($request->hasFile('logo_2')) {
      $file = $request->file('logo_2');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "2." . $extension;
      $file->move(env('APP_PUBLIC') . 'img_puk/', $filename);
      $puk->logo_2 = $filename;
    }

    // input user
    $user = new User;
    $user->name = $request->nama;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->password_show = $request->password;
    $user->save();

    $puk->user_id = $user->id;
    $puk->save();

    return redirect()->route('puk')->with('message', 'Data berhasil disimpan');
  }

  public function edit($id)
  {
    $puk = Puk::find($id);
    $jenisProduksis = JenisProduksi::get();
    $kabupatens = Kabupaten::get();
    $kecamatans = Kecamatan::get();

    return view('puk.edit', [
      'puk' => $puk, 
      'jenisProduksis' => $jenisProduksis,
      'kabupatens' => $kabupatens,
      'kecamatans' => $kecamatans
    ]);
  }

  public function update(Request $request, $id)
  {
    $puk = Puk::find($id);
    $puk->nama = $request->nama;
    $puk->alamat = $request->alamat;
    $puk->kabupaten_id = $request->kabupaten_id;
    $puk->kecamatan_id = $request->kecamatan_id;
    $puk->kode_pos = $request->kode_pos;
    $puk->kode_cos = $request->kode_cos;
    $puk->jenis_produksi_id = $request->jenis_produksi_id;
    $puk->ketua = $request->ketua;
    $puk->ketua_telp = $request->ketua_telp;
    $puk->ketua_email = $request->ketua_email;
    $puk->sekretaris = $request->sekretaris;
    $puk->sekretaris_telp = $request->sekretaris_telp;
    $puk->sekretaris_email = $request->sekretaris_email;
    $puk->telp = $request->telp;
    $puk->fax = $request->fax;
    $puk->bank = $request->bank;
    $puk->rekening_nomor = $request->rekening_nomor;
    $puk->rekening_a_n = $request->rekening_a_n;

    // logo 1
    if($request->hasFile('logo_1')) {
      $file = $request->file('logo_1');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "1." . $extension;
      $file->move(env('APP_PUBLIC') . 'img_puk/', $filename);
      $puk->logo_1 = $filename;
    }
    // logo 2
    if($request->hasFile('logo_2')) {
      $file = $request->file('logo_2');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "2." . $extension;
      $file->move(env('APP_PUBLIC') . 'img_puk/', $filename);
      $puk->logo_2 = $filename;
    }
    
    $puk->save();

    return redirect()->route('puk')->with('message', 'Data berhasil diubah');
  }

  public function delete($id)
  {
    $puk = Puk::find($id);
    
    // hapus user puk
    $user = User::find($puk->user_id);
    $user->delete();

    $puk->delete();

    return redirect()->route('puk')->with('message', 'Data berhasil dihapus');
  }
}
