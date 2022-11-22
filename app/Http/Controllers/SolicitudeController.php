<?php

namespace App\Http\Controllers;

use App\Mail\NotificaSolicitud;
use App\Models\Archivo;
use App\Models\Vacante;
use App\Models\Solicitude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SolicitudeController extends Controller
{
    /* 
        La siguiente funcion es para validar si el usuario está logeado o no. 

        En caso de no estar logeado con una cuenta, no se le permitirá acceder 
        a ninguno de los metodos.

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
        //Se asignan en 'solicitudes' todas las instancias del modelo Solicitud y se mandan a la vista Index
        $solicitudes = Solicitude::with('vacante', 'archivos')->get();
        //ACTUALIZACION *Solución al problema N+1* junto a solicitudes, también se hace una pre-carga de la tabla vacante y 
        //los archivos que estén vinculados a la solicitud

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
        
        /**
         * La sigueinte linea consiste en guardar un atributo que no viene directo del formulario
         * en este caso sería el user_id que se obtiene de la sesion que está activa.
         */
        $request->merge(['user_id' => Auth::id()]);

        $solicitude = Solicitude::create($request->all());

        // Validación de archivos //
        if ($request->file('archivo')->isValid()) {
            /** Se asigna en 'ubicacion' el path del archivo que se almacena dentro de la carpeta local 'solicitudes' */
            $ubicacion = $request->archivo->store('solicitudes');

            // Inicializamos un nuevo objeto Archivo //
            $archivo = new Archivo();
            // Le asignamos al atributo 'ubicacion' del modelo 'archivo' su ubicacion de almacenamiento //
            $archivo->ubicacion = $ubicacion;
            // Le asignamos al atributo 'nombreOriginal' del modelo 'archivo' una función que ayuda a obtener el nombre original del cliente //
            $archivo->nombreOriginal = $request->archivo->getClientOriginalName();
            // Le asignamos al atributo 'mime' del modelo 'archivo' un valor por default //
            $archivo->mime = '';

            // Guardamos el objeto 'archivo' con la relación a nivel modelo //
            $solicitude->archivos()->save($archivo);
        }
        
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
        $this->authorize('view', $solicitude);
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
        /** Si el GATE retorna un FALSE, se lanzará una pagina de abortar porque no se puede realizar la acción */
        if(! Gate::allows('edita-solicitude', $solicitude)){
            abort(403);
        }
        
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
        $this->authorize('delete', $solicitude);
        $solicitude->delete();

        return redirect('/solicitude');
    }

    /**
     * Esta es una función que descarga un archivo almacenado,
     * Se descarga el archivo desde la ubicación donde está dicho archivo
     */

    public function descargaArchivo(Archivo $archivo)
    {
        /**El método download() puede esperar dos parámetros:
         * 1. La ubicación del archivo
         * 2. El nombre con el que se va a descargar dicho archivo
         */
        return Storage::download($archivo->ubicacion, $archivo->nombreOriginal);
    }

    public function notificarSolicitud(Solicitude $solicitude)
    {
        Mail::to($solicitude->user->email)->send(new NotificaSolicitud($solicitude));

        return back();
    }
}
