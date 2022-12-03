<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    /* 
        La siguiente funcion es para validar si el usuario está logeado o no. 

        En caso de no estar logeado con una cuenta, no se le permitirá acceder 
        a los metodos de create, store, edit, update y delete, pero al index y al
        metodo show si podrá tener acceso. 

        En caso de estar logeado, tendrá acceso a todos los metodos disponibles en
        este controlador.
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas/empresaIndex', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas/empresaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreEmpresa' => 'required|string|max:50',
            'descripcionEmpresa' => 'required|string|min:5|max:255',
        ]);

        Empresa::create($request->all());

        return redirect('/empresa')->with([
            'mensaje' => 'Empresa añadida al sistema correctamente.',
            'alert_type' => 'alert-success',
            'icon' => 'fa-solid fa-check'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        $empresas = Empresa::all();
        return view('empresas/empresaShow', compact('empresa', 'empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas/empresaEdit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $updateEmpresa = $empresa->id;
        
        $request->validate([
            'nombreEmpresa' => 'required|string|max:50',
            'descripcionEmpresa' => 'required|string|min:5|max:255',
        ]);

        Empresa::where('id', $empresa->id)->update($request->except('_token', '_method'));

        return redirect('/empresa')->with([
            'mensaje' => 'Datos de la Empresa '. $updateEmpresa .' actualizados correctamente.',
            'alert_type' => 'alert-primary',
            'icon' => 'fa-solid fa-pen-to-square'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $mensajeError = '';
        $count=0;
        $deleteNameEmpresa = $empresa->nombreEmpresa;

        // Contamos los registros en las relaciones
        $count+=count($empresa->vacantes);
        // Comprobamos si existen registros 
        if($count>0) {
            $mensajeError =  'La empresa '. $deleteNameEmpresa .' no puede ser eliminada, por favor, reasigna las vacantes a otra empresa.';

            return redirect('empresa')->with([
                'mensaje' => $mensajeError,
                'alert_type' => 'alert-danger',
                'icon' => 'fa-solid fa-pen-to-square'
            ]);
            
        } else {
            // si no hay registros eliminamos
            $empresa->delete();

            return redirect('empresa')->with([
                'delete' => 'La empresa '. $deleteNameEmpresa .' ha sido eliminada del sistema correctamente.',
            ]);
        }
    }
}