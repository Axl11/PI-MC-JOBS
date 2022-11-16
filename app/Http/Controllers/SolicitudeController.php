<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use App\Models\Vacante;
use Illuminate\Http\Request;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se asignan en 'solicitudes' todas las instancias del modelo Solicitud y se mandan a la vista Index
        $solicitudes = Solicitude::all();

        //Se asignan en 'vacantes' todas las instancias del modelo Vacante y se mandan a la vista Index
        $vacantes = Vacante::all();

        return view('solicitudes/solicitudeIndex', compact('solicitudes', 'vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se asignan en 'vacantes' todas las instancias del modelo Vacante y se mandan a la vista Create
        $vacantes = Vacante::all();

        return view('solicitudes/solicitudeCreate', compact('vacantes'));
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
            'nombreUser'=>'required|string|max:50',
            'apellidoUser'=>'required|string|max:50',
            'edadUser'=>'required|string|min:0|max:150',
            'ciudadUser'=>'required|string|max:30',
            'coloniaUser'=>'required|string|max:30',
            'telefonoUser'=>'required|string|digits:10',
            'correoUser' => 'required|email',
            'vacante_id' => 'required|exists:vacantes,id',
        ]);

        Solicitude::create($request->all());

        return redirect('/solicitude');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitude $solicitude)
    {
        //Se asignan en 'vacantes' todas las instancias del modelo Vacante y se mandan a la vista Show
        $vacantes = Vacante::all();

        return view('solicitudes/solicitudeShow', compact('solicitude', 'vacantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitude $solicitude)
    {
        //Se asignan en 'vacantes' todas las instancias del modelo Vacante y se mandan a la vista Edit
        $vacantes = Vacante::all();

        return view('solicitudes/solicitudeEdit', compact('solicitude', 'vacantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        $request->validate([
            'nombreUser'=>'required|string|max:50',
            'apellidoUser'=>'required|string|max:50',
            'edadUser'=>'required|string|min:0|max:150',
            'ciudadUser'=>'required|string|max:30',
            'coloniaUser'=>'required|string|max:30',
            'telefonoUser'=>'required|string|digits:10',
            'correoUser' => 'required|email',
            'vacante_id' => 'required|exists:vacantes,id',
        ]);
        
        Solicitude::where('id', $solicitude->id)->update($request->except('_token', '_method'));

        return redirect('/solicitude');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitude $solicitude)
    {
        $solicitude->delete();

        return redirect('/solicitude');
    }
}
