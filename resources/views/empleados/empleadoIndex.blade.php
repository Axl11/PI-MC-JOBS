<!DOCTYPE html>
<html lang="es">

<x-head titulo="Index Empleados">

<x-navbar></x-navbar>
<div class="container mt-5 pt-5">
    <div class="text-center">
        <h1 class="text-dark pt-3">Listado de Empleados</h1>         
    </div>

    <x-alert></x-alert>
    
    <div class="border-button ps-4 pe-4 my-3 d-flex ">
        <a href="/empleado/create">Añadir nuevo empleado</a>
        <a class="ms-auto" href="/empleados/papelera">PAPELERA</a>
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
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
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
                                    <a class="btn btn-woox text-light" href="/empleado/{{ $empleado->id }}/edit">Editar</a>
                                </td>
                                <td>
                                    <form class="formulario-eliminar" action="/empleado/{{ $empleado->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger" value="Eliminar">
            
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
<!-- <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
</footer> -->

</x-head>

</html>