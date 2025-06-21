<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Listar todas las categorias disponibles
     */
   public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Listar una unica categoria
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Metodo para creacion de nuevo registro lo puede realizar solo el administrador
     */

    public function store(Request $request)
    {

        $this->authorizeAdmin();


       try {
        DB::beginTransaction();
        $validated = $request->validate([
            'name' => 'required|string|unique:categories|max:255',
            'description' => 'nullable|string',
        ]);
         DB::commit();
        $category = Category::create($validated);

        return response()->json($category, 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error al crear la categoría intentelo mas tarde',
            'error' => $e->getMessage()
        ], 500);
    }
    }
    /**
     * Metodo para actualizar registros lo puede realizar solo administrador
     */

    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        try{
            DB::beginTransaction();
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);
        DB::commit();
        $category->update($validated);

        return response()->json($category);


    } catch (\Illuminate\Validation\ValidationException $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error al actualizar la categoría intentelo mas tarde',
            'error' => $e->getMessage()
        ], 500);
    }
    }

    /**
     * Metodo para eliminar Categorias lo puede realizar unicamente el Administrador
     */

    public function destroy($id)
    {
        $this->authorizeAdmin();
        try {

        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Categoría eliminada']);
           }catch (\Exception $e) {
        return response()->json([
            'message' => 'Error al Eliminar la categoría intentelo mas tarde',
            'error' => $e->getMessage()
        ], 500);
    }

    }

    /**
     * Metodo encargado de validar cual es el rol del usuario autenticado
     */

    private function authorizeAdmin()
    {
        if (auth()->user()->admin !== 'admin') {
            abort(403, 'Acceso denegado. Solo administradores.');
        }
    }
}
