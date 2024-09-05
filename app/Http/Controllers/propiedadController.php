<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;

class PropiedadController extends Controller
{
    // Muestra una lista de todas las propiedades
    public function index(){
        try {
            $propiedades = Propiedad::all(); // Obtiene todas las propiedades
            return view('propiedades.index', compact('propiedades'));

        } catch (\Exception $e) {
            // En caso de error, redirige con un mensaje de error
            return redirect()->route('propiedades.index')->with('error', 'Error al obtener las propiedades.');
        }

    }

    // Muestra el formulario para crear una nueva propiedad
    public function create(){
        return view('propiedades.create'); // Retorna la vista para crear una nueva propiedad
    }

    // Almacena una nueva propiedad en la base de datos
    public function store(Request $request){

        
        $request->validate([
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string',
        ]);

        try {
             
            $propiedad = new Propiedad();
            $propiedad->direccion = $request->input('direccion');
            $propiedad->ciudad = $request->input('ciudad');
            $propiedad->precio = $request->input('precio');
            $propiedad->descripcion = $request->input('descripcion');
            $propiedad->save(); // Guarda la nueva propiedad en la base de datos
    
            return redirect()->route('propiedades.index')->with('success', 'Propiedad agregada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('propiedades.index')->with('error', 'Error al agregar a una propiedad al sistema.');
        }
    }

    // Muestra el formulario para editar una propiedad existente
    public function edit($id){
        $propiedad = Propiedad::findOrFail($id); // Obtiene la propiedad por su ID o muestra un error 404 si no se encuentra
        return view('propiedades.edit', compact('propiedad')); // Retorna la vista de edición con la propiedad
    }

    // Actualiza una propiedad existente en la base de datos
    public function update(Request $request, $id){
       
        try {
            $propiedad = Propiedad::findOrFail($id); // Obtiene la propiedad por su ID o muestra un error 404 si no se encuentra
        
            $request->validate([
                'direccion' => 'required|string|max:255',
                'ciudad' => 'required|string|max:255',
                'precio' => 'required|numeric',
                'descripcion' => 'required|string',
            ]);
            
            $propiedad->direccion = $request->input('direccion');
            $propiedad->ciudad = $request->input('ciudad');
            $propiedad->precio = $request->input('precio');
            $propiedad->descripcion = $request->input('descripcion');
            $propiedad->save(); // Actualiza la propiedad en la base de datos
    
            // Redirige con un mensaje de éxito
            return redirect()->route('propiedades.index')->with('success', 'Propiedad actualizada con éxito.'); // Redirige a la lista de propiedades con un mensaje de éxito
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // En caso de que el modelo no se encuentre
            return redirect()->route('propiedades.index')->with('error', 'Propiedad no encontrada.');
        } catch (\Exception $e) {
            // En caso de cualquier otro error
            return redirect()->route('propiedades.index')->with('error', 'Error al actualizar la propiedad.');
        }

    }

    // Elimina una propiedad existente de la base de datos
    public function destroy($id){
        
        try {
            $propiedad = Propiedad::findOrFail($id); // Obtiene la propiedad por su ID o muestra un error 404 si no se encuentra
            $propiedad->delete(); // Elimina la propiedad de la base de datos

            return redirect()->route('propiedades.index')->with('success', 'Propiedad eliminada con éxito.'); // Redirige a la lista de propiedades con un mensaje de éxito

        } catch (\Exception $e) {
            return redirect()->route('propiedades.index')->with('error', 'Error al eliminar la propiedad del sistema.');
        }

       
    }
}
