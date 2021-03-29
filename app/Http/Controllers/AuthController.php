<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
  public function register(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|min:6'
      ]);

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
      ]);

      return response()->json($user);
  }

  public function login(Request $request)
  {
    $request->validate([
        'email' => 'email|required',
        'password' => 'required'
    ]);

    $credentials = request(['email', 'password']);
    if (!auth()->attempt($credentials)) {
        return response()->json([
            'message' => 'El email o la contraseña son incorrectos.',
            'errors' => [
                'password' => [
                    'Invalid credentials'
                ],
            ]
        ], 422);
    }

    $user = User::where('email', $request->email)->first();
    $authToken = $user->createToken('auth-token')->plainTextToken;

    return response()->json([
        'access_token' => $authToken,
    ]);
  }
}
