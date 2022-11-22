<!DOCTYPE html>
<html lang="en">

<x-head titulo="Papelera Vacantes">

    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Papelera de Vacantes</h1>         
        </div>
        <div class="border-button ps-4 pe-4 my-3 d-flex">
            <a href="/vacante">Regresar</a>
        </div>
        <div class="container-fluid mt-1 px-4">
            <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <table class="table align-middle table-light table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Puestos disponibles</th>
                                <th scope="col">Restaurar</th>
                                <th scope="col">Borrar</th>
                            </tr>
                        </thead>
                        @foreach ($vacantes as $vacante)
                        <tbody>
                            <tr class="text-dark text-center">
                                <td class="table-dark">
                                    <a href="/vacante/{{ $vacante->id }}">
                                        {{ $vacante->nombreVacante }}
                                    </a>
                                </td>
                                <td>{{ $vacante->descripcionVacante }}</td>
                                <td>{{ $vacante->empresa->nombreEmpresa }}</td>
                                <td>{{ $vacante->sueldoVacante }}</td>
                                <td>{{ $vacante->direccionVacante }}</td>
                                <td>{{ $vacante->horarioVacante }}</td>
                                <td>{{ $vacante->puestosDisponibles }}</td>
                                <td>
                                    <a class="btn btn-woox text-light" href="/vacantes/{{ $vacante->id }}/restore">Restaurar</a>
                                </td>
                                <td>
                                    <form class="formulario-eliminar" action="/vacantes/papelera/{{ $vacante->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="Borrar">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

</x-head>
</html>