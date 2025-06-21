<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
  // Metodo que recibe el formulario
  public function login(Request $request)
  {
    $this->validateLogin($request);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Las credenciales ingresadas no son correctas.'
        ], Response::HTTP_UNPROCESSABLE_ENTITY); //422
    }

    return response()->json([
        'data' => [
            'attributes' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'alias' => $user->user_alias,
            ],
            'token' => $user->verification_token
        ]
    ], Response::HTTP_OK);
  }

  // Metodo que verifica que llegue la informacion correctamente
  public function validateLogin(Request $request)
  {
    return $request->validate([
      'email' => 'required|email',
      'password' => 'required',
      'name' => 'required'
    ]);
  }
}
