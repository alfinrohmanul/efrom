<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduksi extends Model
{
  use HasFactory;

  public function dataPuk() {
    return $this->hasMany(Puk::class, 'jenis_produksi_id', 'id');
  }
}
