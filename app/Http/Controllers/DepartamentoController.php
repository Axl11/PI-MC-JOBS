<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
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
        $departamentos = Departamento::all();
        return view('departamentos/departamentoIndex', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos/departamentoCreate');
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
            'nombreDepartamento' => 'required|string|max:50',
            'descripcionDepartamento' => 'required|string|min:5|max:255',
        ]);

        Departamento::create($request->all());

        return redirect('/departamento')->with([
            'mensaje' => 'Departamento añadido al sistema correctamente.',
            'alert_type' => 'alert-success',
            'icon' => 'fa-solid fa-check'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $departamentos = Departamento::all();
        return view('departamentos/departamentoShow', compact('departamento', 'departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('departamentos/departamentoEdit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        $updateDepartamento = $departamento->id;

        $request->validate([
            'nombreDepartamento' => 'required|string|max:50',
            'descripcionDepartamento' => 'required|string|min:5|max:255',
        ]);

        Departamento::where('id', $departamento->id)->update($request->except('_token', '_method'));

        return redirect('/departamento')->with([
            'mensaje' => 'Datos del Departamento '. $updateDepartamento .' actualizados correctamente.',
            'alert_type' => 'alert-primary',
            'icon' => 'fa-solid fa-pen-to-square'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $deleteName = $departamento->nombreDepartamento;
        $departamento->delete();

        return redirect('departamento')->with([
            'delete' => 'El Departamento '. $deleteName .' ha sido eliminado del sistema correctamente, se ha quitado la relación con los empleados.'
        ]);
    }
}
