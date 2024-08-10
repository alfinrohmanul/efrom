<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
  use HasFactory;

  public function dataPuk() {
    return $this->belongsTo(Puk::class, 'puk_id', 'id');
  }
}
