<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados/empleadoIndex', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados/empleadoCreate');
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
            'nombreEmpleado' => 'required|string|max:50',
            'apellidoEmpleado' => 'required|string|max:50',
            'numeroSeguroSocialEmpleado' => 'required|string|size:11',
            'puestoLaboralEmpleado' => 'required|string|max:30',
            'sueldoEmpleado' => 'required|min:0',
            'rfcEmpleado' => 'required|string|min:12|max:13',
            'fechaNacimientoEmpleado' => 'required|date',
            'curpEmpleado' => 'required|string|size:18',
            'antiguedadEmpleado' => 'required|integer|min:0',
        ]);

        Empleado::create($request->all());

        return redirect('/empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleados/empleadoShow', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados/empleadoEdit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombreEmpleado' => 'required|string|max:50',
            'apellidoEmpleado' => 'required|string|max:50',
            'numeroSeguroSocialEmpleado' => 'required|string|size:11',
            'puestoLaboralEmpleado' => 'required|string|max:30',
            'sueldoEmpleado' => 'required|min:0',
            'rfcEmpleado' => 'required|string|min:12|max:13',
            'fechaNacimientoEmpleado' => 'required|date',
            'curpEmpleado' => 'required|string|size:18',
            'antiguedadEmpleado' => 'required|integer|min:0',
        ]);
 
        // METODO 1: Update para la información nueva.

        /* $empleado->nombreEmpleado = $request->nombreEmpleado;
        $empleado->apellidoEmpleado = $request->apellidoEmpleado;
        $empleado->numeroSeguroSocialEmpleado = $request->numeroSeguroSocialEmpleado;
        $empleado->puestoLaboralEmpleado = $request->puestoLaboralEmpleado;
        $empleado->sueldoEmpleado = $request->sueldoEmpleado;
        $empleado->rfcEmpleado = $request->rfcEmpleado;
        $empleado->fechaNacimientoEmpleado = $request->fechaNacimientoEmpleado;
        $empleado->curpEmpleado = $request->curpEmpleado;
        $empleado->antiguedadEmpleado = $request->antiguedadEmpleado;
        $empleado->save(); */

        // METODO 2: Update para la información nueva

        Empleado::where('id', $empleado->id)->update($request->except('_token', '_method'));

        return redirect('/empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect('/empleado');
    }
}
