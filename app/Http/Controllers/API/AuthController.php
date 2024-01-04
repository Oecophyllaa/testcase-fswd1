<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $input = [
      'email' => $request->input('email'),
      'password' => $request->input('password'),
    ];

    $user = User::where('email', $input['email'])->first();

    if (Auth::attempt($input)) {
      $token = $user->createToken('token')->plainTextToken;

      return response()->json([
        'code' => 200,
        'status' => 'success',
        'message' => 'login sukses',
        'token' => $token,
      ]);
    } else {
      return response()->json([
        'code' => 401,
        'status' => 'error',
        'message' => 'login failed',
      ]);
    }
  }
}
