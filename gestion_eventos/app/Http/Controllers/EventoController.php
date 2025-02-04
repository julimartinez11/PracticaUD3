<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Muestra la lista de todos los eventos con sus relaciones.
     * Endpoint: GET /api/eventos
     */
    public function index()
{
    $eventos = Evento::all();
    return response()->json($eventos, 200);
}


    /**
     * Muestra un evento específico por su ID.
     * Endpoint: GET /api/eventos/{id}
     */
    public function show($id)
    {
        // Se busca el evento y se cargan las relaciones para tener todos los datos necesarios.
        $evento = Evento::with('actividades', 'detalle', 'recursos')->findOrFail($id);
        return response()->json($evento, 200);
    }

    /**
     * Crea un nuevo evento.
     * Endpoint: POST /api/eventos
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos.
        $data = $request->validate([
            'nombre'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'fecha_inicio'  => 'required|date'
        ]);

        // Se crea el evento en la base de datos.
        $evento = Evento::create($data);

        // Se retorna el evento creado con código 201 (creado).
        return response()->json($evento, 201);
    }

    /**
     * Actualiza un evento existente.
     * Endpoint: PUT/PATCH /api/eventos/{id}
     */
    public function update(Request $request, $id)
    {
        // Se obtiene el evento por ID, o se retorna 404 si no existe.
        $evento = Evento::findOrFail($id);

        // Validación condicional: 'sometimes' indica que la regla se aplica si el campo está presente.
        $data = $request->validate([
            'nombre'        => 'sometimes|required|string|max:255',
            'descripcion'   => 'nullable|string',
            'fecha_inicio'  => 'sometimes|required|date'
        ]);

        // Actualiza el evento con los datos validados.
        $evento->update($data);

        return response()->json($evento, 200);
    }

    /**
     * Elimina un evento.
     * Endpoint: DELETE /api/eventos/{id}
     */
    public function destroy($id)
    {
        // Se busca el evento, se elimina y se devuelve un mensaje de confirmación.
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return response()->json(['mensaje' => 'Evento eliminado correctamente'], 200);
    }
}
