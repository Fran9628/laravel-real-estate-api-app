<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    // Lista las personas
    public function index(){
       
        try {
            $personas = Persona::all(); // Obtiene todas las personas
            return view('personas.index', compact('personas'));

        } catch (\Exception $e) {
            // En caso de error, redirige con un mensaje de error
            return redirect()->route('personas.index')->with('error', 'Error al obtener el listado de personas.');
        }
    }

    // Muestra el formulario para crear una nueva persona
    public function create(){
        return view('personas.create'); // Retorna la vista para crear una nueva persona
    }

    // Almacena una nueva persona en la base de datos
    public function store(Request $request){

        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email' => 'required|email|unique:persona,email',
                'telefono' => 'required|string|max:15',
            ]);
    
            Persona::create($request->all());
    
            return redirect()->route('personas.index')->with('success', 'Persona agregada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('personas.index')->with('error', 'Error al agregar la persona.');
        }
        
    }

    // Muestra el formulario para editar una persona existente
    public function edit($id){
        $persona = Persona::findOrFail($id); // Obtiene la persona por su ID o muestra un error 404 si no se encuentra
        return view('personas.edit', compact('persona')); // Retorna la vista de edición con la persona
    }

    // Actualiza una persona existente en la base de datos
    public function update(Request $request, $id){

        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email' => 'required|email|unique:persona,email,' . $id,
                'telefono' => 'required|string|max:15',
            ]);
    
            $persona = Persona::findOrFail($id);
            $persona->update($request->all());
    
            return redirect()->route('personas.index')->with('success', 'Persona actualizada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('personas.index')->with('error', 'Error al actualizar la persona.');
        }    
    }

    // Elimina una persona existente de la base de datos
    public function destroy($id){

        try {
            $persona = Persona::findOrFail($id); // Obtiene la persona buscada o entrega un error 404 si no se encuentra
            $persona->delete(); // Elimina la persona de la base de datos
    
            return redirect()->route('personas.index')->with('success', 'Persona eliminada con éxito.');

        } catch (\Exception $e) {
            return redirect()->route('personas.index')->with('error', 'Error al eliminar la persona del sistema.');
        }
    }
}
