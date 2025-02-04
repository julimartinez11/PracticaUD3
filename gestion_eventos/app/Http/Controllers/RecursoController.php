<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Muestra la lista de recursos.
     * Endpoint: GET /api/recursos
     */
    public function index()
    {
        $recursos = Recurso::all();
        return response()->json($recursos, 200);
    }

    /**
     * Muestra un recurso específico.
     * Endpoint: GET /api/recursos/{id}
     */
    public function show($id)
    {
        $recurso = Recurso::findOrFail($id);
        return response()->json($recurso, 200);
    }

    /**
     * Crea un nuevo recurso.
     * Endpoint: POST /api/recursos
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo'        => 'required|string|max:100',
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $recurso = Recurso::create($data);
        return response()->json($recurso, 201);
    }

    /**
     * Actualiza un recurso existente.
     * Endpoint: PUT/PATCH /api/recursos/{id}
     */
    public function update(Request $request, $id)
    {
        $recurso = Recurso::findOrFail($id);

        $data = $request->validate([
            'tipo'        => 'sometimes|required|string|max:100',
            'nombre'      => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $recurso->update($data);
        return response()->json($recurso, 200);
    }

    /**
     * Elimina un recurso.
     * Endpoint: DELETE /api/recursos/{id}
     */
    public function destroy($id)
    {
        $recurso = Recurso::findOrFail($id);
        $recurso->delete();
        return response()->json(['mensaje' => 'Recurso eliminado correctamente'], 200);
    }
}
