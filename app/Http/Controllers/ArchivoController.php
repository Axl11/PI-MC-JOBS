<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        return view('archivos/archivoEdit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        $request->validate([
            'archivo'=>'required',
        ]);

        $file = Archivo::findOrFail($archivo->id);
            
        if($request->hasFile('archivo')){
            //Se comprueba que exista la foto
            if(Storage::exists($file->ubicacion))
            {
                //En esta linea se borra la ubicación local
                Storage::delete($file->ubicacion);
            }
            $file->ubicacion = Storage::putFile('public', $request->file('archivo'));
            $file->nombreOriginal = $request->file('archivo')->getClientOriginalName();
        }

        $file->update($request->only('ubicacion','nombreOriginal'));
        
        return redirect('/solicitude')->with([
            'mensaje' => 'Archivo actualizado correctamente.',
            'alert_type' => 'alert-primary',
            'icon' => 'fas fa-check'
        ]);  

        // $id = $archivo->id;

        // //Obtener el archivo que se quiere eliminar
        // $file = Archivo::whereId($id)->firstOrFail();

        // //Borrar el registro de la base de datos
        // // $file->delete();

        // $file_new = $request->file('archivo');

        // if ($file_new->isValid()) {
        //     /** Se asigna en 'ubicacion' el path del archivo que se almacena dentro de la carpeta local 'public' */
        //     $ubicacion = $file_new->store('public');
            
        //     // Inicializamos un nuevo objeto Archivo //
        //     $archivo = $file;
        //     // Le asignamos al atributo 'ubicacion' del modelo 'archivo' su ubicacion de almacenamiento //
        //     $archivo->ubicacion = $ubicacion;
        //     // Le asignamos al atributo 'nombreOriginal' del modelo 'archivo' una función que ayuda a obtener el nombre original del cliente //
        //     $archivo->nombreOriginal = $file_new->getClientOriginalName();
        //     // Le asignamos al atributo 'mime' del modelo 'archivo' un valor por default //
        //     $archivo->mime = '';

        //     //Borrar del Storage - Almacenamiento Local
        //     unlink(public_path(Storage::url($file->ubicacion)));
            
        //     // Guardamos el objeto 'archivo' con la relación a nivel modelo //
        //     Archivo::where('id', $id)->update(['id' => $archivo->id, 'solicitude_id' => $archivo->solicitude_id ,'ubicacion' => $archivo->ubicacion, 'nombreOriginal' => $archivo->nombreOriginal, 'mime' => $archivo->mime]);
        //     // $archivo->save();
        // }

        // return redirect('/solicitude')->with([
        //     'mensaje' => 'Archivo actualizado correctamente.',
        //     'alert_type' => 'alert-primary',
        //     'icon' => 'fas fa-check'
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el archivo que se quiere eliminar
        $file = Archivo::whereId($id)->firstOrFail();

        //Borrar del Storage - Almacenamiento Local
        unlink(public_path(Storage::url($file->ubicacion)));

        //Borrar el registro de la base de datos
        $file->delete();

        return back();
    }
}
