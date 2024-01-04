<?php

namespace App\Http\Requests\Karyawan;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'nomor_induk' => ['required', 'string', 'size:7', 'starts_with:IP', 'unique:karyawan,nomor_induk'],
      'nama' => ['required', 'string', 'max:255'],
      'alamat' => ['required', 'max:255'],
      'tgl_lahir' => ['required', 'date'],
      'tgl_bergabung' => ['required', 'date'],
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
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
    ];
  }
}
