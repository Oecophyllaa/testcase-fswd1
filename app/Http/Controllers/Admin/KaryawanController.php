<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Karyawan\StoreRequest;
use App\Http\Requests\Karyawan\UpdateRequest;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('pages.admin.karyawan.index', [
      'employees' => Karyawan::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.admin.karyawan.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRequest $request)
  {
    $validated = $request->validated();
    // dd($validated);

    $create = Karyawan::create($validated);
    if ($create) {
      return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    return abort(500);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Karyawan $karyawan)
  {
    return view('pages.admin.karyawan.edit', compact('karyawan'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRequest $request, Karyawan $karyawan)
  {
    $validated = $request->validated();
    // dd($validated);

    $update = $karyawan->update($validated);
    if ($update) {
      return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan berhasil diupdate');
    }

    return abort(500);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Karyawan $karyawan)
  {
    $delete = $karyawan->delete();
    if ($delete) {
      return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan berhasil dihapus');
    }

    return abort(500);
  }
}
