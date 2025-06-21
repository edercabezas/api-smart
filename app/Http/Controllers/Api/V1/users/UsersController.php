<?php

namespace App\Http\Controllers\Api\V1\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    /**
     * Metodo encargado de registrar nuevo Usuario
     */

public function register(Request $request)
{
    try {
         DB::beginTransaction();
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'admin'    => ['nullable', Rule::in(['admin', 'user'])]
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'admin'    => $validated['admin'] ?? 'user',
        ]);
        DB::commit();
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);

    } catch (ValidationException $e) {
             DB::rollBack();
        return response()->json([
            'message' => 'Validation failed',
            'errors'  => $e->errors(),
        ], 422);

    } catch (\Exception $e) {
             DB::rollBack();
        return response()->json([
            'message' => $e->getMessage(),
        ], 500);
    }
}

/**
 * Metodo encargadod e realizar la autenticacion del Usuario
 */

public function login(Request $request)
{

    try {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales inválidas.'
            ], 401);
        }

        // Crear token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'token'   => $token,
            'user'    => $user
        ]);

    } catch (ValidationException $e) {
        return response()->json([
            'message' => 'Error de validación',
            'errors'  => $e->errors(),
        ], 422);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error inesperado al iniciar sesión',
            'error'   => $e->getMessage(),
        ], 500);
    }
}

/**
 * Metodo para cerrar la sesión del Usuario
 */
public function logout(Request $request)
{
    try {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada exitosamente.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error inesperado al cerrar sesión',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
