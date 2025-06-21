<?php

namespace App\Http\Controllers\Api\V1\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Metodo para listar todos los productos
     */
    public function index()
    {
        return response()->json(Product::with('category')->get());
    }

    /**
     * Lista un producto con el codigo ID que recibe por paramettro
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Metodo para crear nuevo registro solo Admin
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();
  try{
        DB::beginTransaction();
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

         DB::commit();

        $product = Product::create($validated);
        return response()->json($product, 201);

           } catch (\Illuminate\Validation\ValidationException $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error al registrar el producto intentelo mas tarde',
            'error' => $e->getMessage()
        ], 500);
    }
}

    /**
     * Metodo para Actualizar la Informacion del producto solo Admin
     */
    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        try{
        DB::beginTransaction();

        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);
        DB::commit();

        $product->update($validated);

        return response()->json($product);

        } catch (\Illuminate\Validation\ValidationException $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
          DB::rollBack();
        return response()->json([
            'message' => 'Error al actualizar el producto intentelo mas tarde',
            'error' => $e->getMessage()
        ], 500);
    }
    }

    /**
     * Metodo encargado de eliminar producto unicamente lo puede realizar Admin
     */
    public function destroy($id)
    {
        $this->authorizeAdmin();

        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Producto eliminado']);
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
