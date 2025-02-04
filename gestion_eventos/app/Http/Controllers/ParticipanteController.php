<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Muestra la lista de participantes.
     * Endpoint: GET /api/participantes
     */
    public function index()
    {
        $participantes = Participante::all();
        return response()->json($participantes, 200);
    }

    /**
     * Muestra un participante específico.
     * Endpoint: GET /api/participantes/{id}
     */
    public function show($id)
    {
        $participante = Participante::findOrFail($id);
        return response()->json($participante, 200);
    }

    /**
     * Crea un nuevo participante.
     * Endpoint: POST /api/participantes
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email'    => 'required|email|unique:participantes,email'
        ]);

        $participante = Participante::create($data);
        return response()->json($participante, 201);
    }

    /**
     * Actualiza los datos de un participante.
     * Endpoint: PUT/PATCH /api/participantes/{id}
     */
    public function update(Request $request, $id)
    {
        $participante = Participante::findOrFail($id);

        $data = $request->validate([
            'nombre'   => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'email'    => 'sometimes|required|email|unique:participantes,email,' . $id
        ]);

        $participante->update($data);
        return response()->json($participante, 200);
    }

    /**
     * Elimina un participante.
     * Endpoint: DELETE /api/participantes/{id}
     */
    public function destroy($id)
    {
        $participante = Participante::findOrFail($id);
        $participante->delete();

        return response()->json(['mensaje' => 'Participante eliminado correctamente'], 200);
    }
}
