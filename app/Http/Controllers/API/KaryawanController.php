<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KaryawanResource;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
  public function index()
  {
    $karyawan = Karyawan::all();

    return new KaryawanResource(true, 'Data Karyawan', $karyawan);
  }

  public function show($id)
  {
    $karyawan = Karyawan::where('id', $id)->first();

    return new KaryawanResource(true, 'Detail Data Karyawan', $karyawan);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'nomor_induk' => ['required', 'string', 'size:7', 'starts_with:IP', 'unique:karyawan,nomor_induk'],
      'nama' => ['required', 'string', 'max:255'],
      'alamat' => ['required', 'max:255'],
      'tgl_lahir' => ['required', 'date'],
      'tgl_bergabung' => ['required', 'date'],
    ], [
      'nomor_induk.required' => ':attribute harus diisi',
      'nomor_induk.numeric' => ':attribute harus berupa angka',
      'nomor_induk.size' => ':attribute harus :size digit',
      'nomor_induk.starts_with' => ':attribute harus diawali dengan :values',
      'nomor_induk.unique' => ':attribute sudah terdaftar',

      'nama.required' => ':attribute harus diisi',
      'nama.max' => ':attribute maksimal berisi :max karakter',

      'alamat.required' => ':attribute harus diisi',
      'alamat.max' => ':attribute maksimal berisi :max karakter',

      'tgl_lahir.required' => ':attribute harus diisi',
      'tgl_lahir.date' => ':attribute bukan tanggal yang valid',

      'tgl_bergabung.required' => ':attribute harus diisi',
      'tgl_bergabung.date' => ':attribute bukan tanggal yang valid',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 442);
    }

    $create = Karyawan::create([
      'nomor_induk' => $request->input('nomor_induk'),
      'nama' => $request->input('nama'),
      'alamat' => $request->input('alamat'),
      'tgl_lahir' => $request->input('tgl_lahir'),
      'tgl_bergabung' => $request->input('tgl_bergabung'),
    ]);

    return new KaryawanResource(true, 'Data Karyawan Berhasil Ditambahkan', $create);
  }

  public function update(Request $request, string $id)
  {
    $validator = Validator::make($request->all(), [
      'nomor_induk' => ['required', 'string', 'size:7', 'starts_with:IP', Rule::unique('karyawan', 'nomor_induk')->ignore($this->get('karyawan_id'))],
      'nama' => ['required', 'string', 'max:255'],
      'alamat' => ['required', 'max:255'],
      'tgl_lahir' => ['required', 'date'],
      'tgl_bergabung' => ['required', 'date'],
    ], [
      'nomor_induk.required' => ':attribute harus diisi',
      'nomor_induk.numeric' => ':attribute harus berupa angka',
      'nomor_induk.size' => ':attribute harus :size digit',
      'nomor_induk.starts_with' => ':attribute harus diawali dengan :values',
      'nomor_induk.unique' => ':attribute sudah terdaftar',

      'nama.required' => ':attribute harus diisi',
      'nama.max' => ':attribute maksimal berisi :max karakter',

      'alamat.required' => ':attribute harus diisi',
      'alamat.max' => ':attribute maksimal berisi :max karakter',

      'tgl_lahir.required' => ':attribute harus diisi',
      'tgl_lahir.date' => ':attribute bukan tanggal yang valid',

      'tgl_bergabung.required' => ':attribute harus diisi',
      'tgl_bergabung.date' => ':attribute bukan tanggal yang valid',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 442);
    }

    $update = Karyawan::where('id', $id)->update([
      'nomor_induk' => $request->input('nomor_induk'),
      'nama' => $request->input('nama'),
      'alamat' => $request->input('alamat'),
      'tgl_lahir' => $request->input('tgl_lahir'),
      'tgl_bergabung' => $request->input('tgl_bergabung'),
    ]);

    return new KaryawanResource(true, 'Data Karyawan Berhasil Diupdate', $update);
  }

  public function destroy(string $id)
  {
    $karyawan = Karyawan::where('id', $id)->first();
    $delete = $karyawan->delete();

    return new KaryawanResource(true, 'Data Karyawan Berhasil Dihapus', $delete);
  }

  public function recent($limit)
  {
    $karyawan = Karyawan::orderBy('tgl_bergabung', 'desc')->limit($limit)->get();

    return new KaryawanResource(true, 'Data Karyawan Terbaru', $karyawan);
  }
}
