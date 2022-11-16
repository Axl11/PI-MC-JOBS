<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
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

        return view('solicitudes/solicitudeIndex', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se asignan en 'solicitudes' todas las instancias del modelo Solicitude y se mandan a la vista Create
        $solicitudes = Solicitude::all();

        return view('solicitudes/solicitudeCreate', compact('solicitudes'));
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

        return view('solicitudes/solicitudeShow', compact('solicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitude $solicitude)
    {
        return view('solicitudes/solicitudeEdit', compact('solicitude'));
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
