<!DOCTYPE html>
<html lang="en">

<x-head titulo="Papelera Empleados">
    
<x-navbar></x-navbar>

<div class="container mt-5 pt-5">
    <div class="text-center">
        <h1 class="text-dark pt-3">Papelera de Empleados</h1>         
    </div>
    <div class="border-button ps-4 pe-4 my-3 d-flex">
        <a href="/empleado">Regresar</a>
    </div>
    <div class="container-fluid mt-1 px-4">
        <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Departamentos</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col">NSS</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Fecha Nacimiento</th>
                                <th scope="col">CURP</th>
                                <th scope="col">Antiguedad</th>
                                <th scope="col">Restaurar</th>
                                <th scope="col">Borrar</th>
                            </tr>
                        </thead>
                        @foreach ($empleados as $empleado)
                        <tbody>
                            <tr class="text-dark text-center">
                                <td class="table-dark">
                                    <a href="/empleado/{{ $empleado->id }}">
                                        {{ $empleado->nombreEmpleado }}
                                    </a>
                                </td>
                                <td>{{ $empleado->apellidoEmpleado }}</td>
                                <td>{{ $empleado->puestoLaboralEmpleado }}</td>
                                <td>
                                    @foreach($empleado->departamentos as $departamento)
                                        {{ $departamento->nombreDepartamento }}</br>
                                    @endforeach
                                </td>
                                <td>{{ $empleado->sueldoEmpleado }}</td>
                                <td>{{ $empleado->numeroSeguroSocialEmpleado }}</td>
                                <td>{{ $empleado->rfcEmpleado }}</td>
                                <td>{{ $empleado->fechaNacimientoEmpleado }}</td>
                                <td>{{ $empleado->curpEmpleado }}</td>
                                <td>{{ $empleado->antiguedadEmpleado }}</td>
                                <td>
                                    <a class="btn btn-woox text-light" href="/empleados/{{ $empleado->id }}/restore">Restaurar</a>
                                </td>
                                <td>
                                    <form class="formulario-eliminar" action="/empleados/papelera/{{ $empleado->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger" value="Borrar">
            
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-head>
</html>