<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudVisita;
use App\Models\Propiedad;
use App\Models\Persona;
use Illuminate\Support\Facades\Log;

class SolicitudVisitaController extends Controller
{
   
    public function index(){
        try {
            // Cargar relaciones 'persona' y 'propiedad'
            $solicitudes = SolicitudVisita::with('persona', 'propiedad')->get();
            return view('solicitudes.index', compact('solicitudes'));
        } catch (\Exception $e) {
            return redirect()->route('solicitudes.index')->with('error', 'Error al cargar las solicitudes de visita.');
        }
    }

    public function create(){
        try {
            $propiedades = Propiedad::all();
            $personas = Persona::all();
            return view('solicitudes.create', compact('propiedades', 'personas'));

        } catch (\Exception $e) {
            return redirect()->route('solicitudes.index')->with('error', 'Error al mostrar el formulario de creación.');
        }
    }

    public function store(Request $request){
        $request->validate([
            'id_persona' => 'required|exists:persona,id',
            'id_propiedad' => 'required|exists:propiedad,id',
            'fecha_visita' => 'required|date',
            'comentario' => 'required|string',
        ]);

        try {

            $solicitud = new SolicitudVisita();
            $solicitud->id_persona = $request->input('id_persona');
            $solicitud->id_propiedad = $request->input('id_propiedad');
            $solicitud->fecha_visita = $request->input('fecha_visita');
            $solicitud->comentario = $request->input('comentario');
            $solicitud->save(); // Guarda la nueva solicitud en la base de datos

            return redirect()->route('solicitudes.index')->with('success', 'Solicitud de visita creada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al crear la solicitud de visita: ' . $e->getMessage());
            return redirect()->route('solicitudes.create')->with('error', 'Error al crear la solicitud de visita.');
        }
    }

    public function edit($id){
        try {
            $solicitud = SolicitudVisita::findOrFail($id);
            $propiedades = Propiedad::all();
            $personas = Persona::all();
            return view('solicitudes.edit', compact('solicitud', 'propiedades', 'personas'));
        } catch (\Exception $e) {
            return redirect()->route('solicitudes.index')->with('error', 'Error al mostrar el formulario de edición.');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_persona' => 'required|exists:persona,id',
            'id_propiedad' => 'required|exists:propiedad,id',
            'fecha_visita' => 'required|date',
            'comentario' => 'required|string',
        ]);

        try {
            $solicitud = SolicitudVisita::findOrFail($id);
            $solicitud->update($request->all());
            return redirect()->route('solicitudes.index')->with('success', 'Solicitud de visita actualizada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la solicitud de visita: ' . $e->getMessage());
            return redirect()->route('solicitudes.edit', $id)->with('error', 'Error al actualizar la solicitud de visita.');
        }
    }

    public function destroy($id){
        try {
            $solicitud = SolicitudVisita::findOrFail($id);
            $solicitud->delete();
            return redirect()->route('solicitudes.index')->with('success', 'Solicitud de visita eliminada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar la solicitud de visita: ' . $e->getMessage());
            return redirect()->route('solicitudes.index')->with('error', 'Error al eliminar la solicitud de visita.');
        }
    }
}
