<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puk extends Model
{
  use HasFactory;

  public function dataJenisProduksi() {
    return $this->belongsTo(JenisProduksi::class, 'jenis_produksi_id', 'id');
  }

  public function dataUser() {
    return $this->hasOne(User::class, 'id', 'user_id');
  }

  public function dataKabupaten() {
    return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id');
  }

  public function dataKecamatan() {
    return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
  }

  public function dataLaporan() {
    return $this->hasMany(Laporan::class, 'puk_id', 'id');
  }
}
