<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Muestra la lista de actividades, incluyendo su evento y participantes.
     * Endpoint: GET /api/actividades
     */
    public function index()
    {
        $actividades = Actividad::with('evento', 'participantes')->get();
        return response()->json($actividades, 200);
    }

    /**
     * Muestra una actividad específica por su ID.
     * Endpoint: GET /api/actividades/{id}
     */
    public function show($id)
    {
        $actividad = Actividad::with('evento', 'participantes')->findOrFail($id);
        return response()->json($actividad, 200);
    }

    /**
     * Crea una nueva actividad.
     * Endpoint: POST /api/actividades
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'evento_id'   => 'required|exists:eventos,id',
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $actividad = Actividad::create($data);
        return response()->json($actividad, 201);
    }

    /**
     * Actualiza una actividad existente.
     * Endpoint: PUT/PATCH /api/actividades/{id}
     */
    public function update(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);

        $data = $request->validate([
            'evento_id'   => 'sometimes|required|exists:eventos,id',
            'nombre'      => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $actividad->update($data);
        return response()->json($actividad, 200);
    }

    /**
     * Elimina una actividad.
     * Endpoint: DELETE /api/actividades/{id}
     */
    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();
        return response()->json(['mensaje' => 'Actividad eliminada correctamente'], 200);
    }
}
