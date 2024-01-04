<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'karyawan';

  protected $fillable = [
    'nomor_induk',
    'nama',
    'alamat',
    'tgl_lahir',
    'tgl_bergabung',
  ];

  protected $casts = [
    'tgl_lahir' => 'date',
    'tgl_bergabung' => 'date',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];

  public function cuti()
  {
    return $this->hasMany(Cuti::class, 'nomor_induk');
  }
}
