<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CutiResource;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
  public function index()
  {
    $cuti = Cuti::all();

    return new CutiResource(true, 'Data Cuti Karyawan', $cuti);
  }

  public function show()
  {
    $sisa_cuti = DB::table('karyawan')
      ->select('karyawan.nomor_induk', 'karyawan.nama')
      ->selectRaw('(12 - COALESCE(SUM(cuti.lama_cuti), 0)) AS sisa_cuti')
      ->leftJoin('cuti', 'karyawan.nomor_induk', '=', 'cuti.nomor_induk')
      ->where('karyawan.deleted_at', '=', null)
      ->groupBy('karyawan.nomor_induk', 'karyawan.nama')
      ->get();

    return new CutiResource(true, 'Data Sisa Cuti Karyawan', $sisa_cuti);
  }
}
