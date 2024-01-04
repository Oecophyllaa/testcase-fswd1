<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuti extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'cuti';

  protected $fillable = [
    'nomor_induk',
    'tgl_cuti',
    'lama_cuti',
    'keterangan',
  ];

  protected $casts = [
    'tgl_cuti' => 'date',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];

  public function karyawan()
  {
    return $this->belongsTo(Karyawan::class, 'nomor_induk', 'nomor_induk');
  }
}
