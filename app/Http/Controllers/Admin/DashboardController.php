<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $employees = Karyawan::orderBy('tgl_bergabung', 'asc')->limit(3)->get();
    return view('pages.admin.dashboard', compact('employees'));
  }
}
