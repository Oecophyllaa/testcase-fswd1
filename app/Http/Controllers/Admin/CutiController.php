<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('pages.admin.cuti.index', [
      'cuti' => Cuti::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
    $sisa_cuti = DB::table('karyawan')
      ->select('karyawan.nomor_induk', 'karyawan.nama')
      ->selectRaw('(12 - COALESCE(SUM(cuti.lama_cuti), 0)) AS sisa_cuti')
      ->leftJoin('cuti', 'karyawan.nomor_induk', '=', 'cuti.nomor_induk')
      ->where('karyawan.deleted_at', '=', null)
      ->groupBy('karyawan.nomor_induk', 'karyawan.nama')
      ->get();
    // dd($sisa_cuti);

    return view('pages.admin.cuti.detail', [
      'sisa_cuti' => $sisa_cuti,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
