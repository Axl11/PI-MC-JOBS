<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
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
        return view('vacantes/vacanteCreate');
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
        ]);

        Vacante::create($request->all());

        return redirect('/vacante');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes/vacanteShow', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        return view('vacantes/vacanteEdit', compact('vacante'));
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
        $request->validate([
            'nombreVacante'=>'required|min:1|max:255',
            'descripcionVacante'=>'required|min:10|max:255',
            'sueldoVacante'=>'min:0',
            'direccionVacante'=>'required|min:1|max:255',
            'horarioVacante'=>'max:255',
            'puestosDisponibles'=>'integer|min:0',
        ]);
        
        Vacante::where('id', $vacante->id)->update($request->except('_token', '_method'));

        return redirect('/vacante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        $vacante->delete();

        return redirect('/vacante');
    }
}
