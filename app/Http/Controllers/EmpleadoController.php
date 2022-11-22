<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
        //Se asignan en 'departamentos' todas las instancias del modelo Departamento y se mandan a la vista Create
        $departamentos = Departamento::all();

        return view('empleados/empleadoCreate', compact('departamentos'));
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

        $empleado = Empleado::create($request->all());

        /*Entramos a la instancia "empleado" en su método "departamentos" 
            para tener acceso vincular el empleado con los departamentos*/
        $empleado->departamentos()->attach($request->departamentos_id);

        return redirect('/empleado')->with([
            'mensaje' => 'Empleado añadido al sistema correctamente.',
            'alert_type' => 'alert-success',
            'icon' => 'fa-solid fa-check'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $empleados = Empleado::all();
        return view('empleados/empleadoShow', compact('empleado', 'empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //Se asignan en 'departamentos' todas las instancias del modelo Departamento y se mandan a la vista Edit
        $departamentos = Departamento::all();

        return view('empleados/empleadoEdit', compact('empleado', 'departamentos'));
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
        $updateEmpleado = $empleado->id;
        
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

        /* Actualiza la información de la tabla del empleado, exceptuando las columnas 'token', 'method' y 'departamentos_id'
            Trabaja sobre la tabla Empleado */
        Empleado::where('id', $empleado->id)->update($request->except('_token', '_method', 'departamentos_id'));

        /* Sirve para quitar relaciones directamente mandandole el id */
        // $empleado->departamentos()->detach(1);
        
        /* Sincroniza la información que el usuario selecciona con respecto a lo que existe dentro de la base de datos
            Trabaja sobre la tabla Pivote */
        $empleado->departamentos()->sync($request->departamentos_id);

        //Redirecciona a la ruta empleado (index)
        // return redirect('/empleado');

        //Redirecciona a la ruta show
        return redirect()->route('empleado.update', $empleado->id)->with([
            'mensaje' => 'Datos del Empleado '. $updateEmpleado .' actualizados correctamente.',
            'alert_type' => 'alert-primary',
            'icon' => 'fa-solid fa-pen-to-square'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $deleteNameEmpleado = $empleado->nombreEmpleado;
        $deleteApellidoEmpleado = $empleado->apellidoEmpleado;
        
        /* Quitamos la relación que existe entre la tabla Empleado y el id de departamentos
            Para que a nivel de base de datos no nos arroje error de llave violada */
        $empleado->departamentos()->detach();

        $empleado->delete();

        return redirect('/empleado')->with([
            'deletePapelera' => 'El Empleado '. $deleteNameEmpleado . ' '. $deleteApellidoEmpleado .' ha sido enviado a la papelera correctamente.'
        ]);
    }

    /**
     * El siguiente metodo es el encargado de recuperar la informacion de solo 
     * los SoftDeletes y los envía por medio de una varible a la vista 
     * PAPELERA
     */

    public function papelera()
    {
        $empleados = Empleado::onlyTrashed()->get();

        return view('empleados/empleadoTrash', compact('empleados'));
    }   

    /**
     * Este metodo hace una eliminación total del registro empleado,
     * se busca el empleado por medio de su ID entre TODOS los registros
     * y se hace un ForceDelete de este registro, para después redirigirnos
     * a la vista INDEX
     */

    public function forcedelete($id)
    {
        $empleado = Empleado::withTrashed()->find($id);
        $empleado->forceDelete();

        $deleteNameEmpleado = $empleado->nombreEmpleado;
        $deleteApellidoEmpleado = $empleado->apellidoEmpleado;

        return redirect('/empleados/papelera')->with([
            'delete' => 'El Empleado '. $deleteNameEmpleado . ' '. $deleteApellidoEmpleado .' ha sido eliminado del sistema correctamente.'
        ]);
    }

     /**
     * El metodo recuperar recibe un ID de un empleado, lo busca entre 
     * TODOS los registros y aplica el metodo restore para actualizar la
     * columna delete_at y hacer que aparezca de nuevo en la vista INDEX
     */

    public function recuperar($id)
    {
        $empleado = Empleado::withTrashed()->find($id);
        $empleado->restore();

        return redirect('/empleado');
    }
}
