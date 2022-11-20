<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Empresa;
use Illuminate\Http\Request;

class VacanteController extends Controller
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
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se asignan en 'vacantes' todas las instancias del modelo Vacante y se mandan a la vista Index
        $vacantes = Vacante::all();

        return view('vacantes/vacanteIndex', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se asignan en 'empresas' todas las instancias del modelo Empresa y se mandan a la vista Create
        $empresas = Empresa::all();

        return view('vacantes/vacanteCreate', compact('empresas'));
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
            'nombreVacante'=>'required|min:1|max:255',
            'descripcionVacante'=>'required|min:10|max:255',
            'sueldoVacante'=>'min:0',
            'direccionVacante'=>'required|min:1|max:255',
            'horarioVacante'=>'max:255',
            'puestosDisponibles'=>'integer|min:0',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        Vacante::create($request->all());

        return redirect('/vacante')->with([
            'mensaje' => 'Vacante añadida al sistema correctamente.',
            'alert_type' => 'alert-success',
            'icon' => 'fa-solid fa-check'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //Se asignan en 'empresas' todas las instancias del modelo Empresa y se mandan a la vista Show
        $empresas = Empresa::all();

        return view('vacantes/vacanteShow', compact('vacante', 'empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //Se asignan en 'empresas' todas las instancias del modelo Empresa y se mandan a la vista Edit
        $empresas = Empresa::all();

        return view('vacantes/vacanteEdit', compact('vacante', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        $updateVacante = $vacante->id;

        $request->validate([
            'nombreVacante'=>'required|min:1|max:255',
            'descripcionVacante'=>'required|min:10|max:255',
            'sueldoVacante'=>'min:0',
            'direccionVacante'=>'required|min:1|max:255',
            'horarioVacante'=>'max:255',
            'puestosDisponibles'=>'integer|min:0',
            'empresa_id' => 'required|exists:empresas,id',
        ]);
        
        Vacante::where('id', $vacante->id)->update($request->except('_token', '_method'));

        return redirect('/vacante')->with([
            'mensaje' => 'Datos de la Vacante '. $updateVacante .' actualizados correctamente.',
            'alert_type' => 'alert-primary',
            'icon' => 'fa-solid fa-pen-to-square'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        $deleteNameVacante = $vacante->nombreVacante;
        $vacante->delete();

        return redirect('/vacante')->with([
            'delete' => 'La Vacante '. $deleteNameVacante .' ha sido eliminada del sistema correctamente.'
        ]);
    }
}
