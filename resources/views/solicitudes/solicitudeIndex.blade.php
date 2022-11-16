<!DOCTYPE html>
<html lang="es">

<x-head titulo="Index Solicitudes">
    
    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Listado de Solicitudes</h1>         
        </div>
        <div class="border-button ps-4 pe-4 my-3 d-flex">
            <a href="/solicitude/create">Crear nueva solicitud</a>
        </div>
        <div class="container-fluid mt-1 px-4">
            <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <table class="table align-middle table-light table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Colonia</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach ($solicitudes as $solicitude)
                        <tbody>
                            <tr class="text-dark text-center">
                                <td class="table-dark">
                                    <a href="/solicitude/{{ $solicitude->id }}">
                                        {{ $solicitude->nombreUser }}
                                    </a>
                                </td>
                                <td>{{ $solicitude->apellidoUser }}</td>
                                <td>{{ $solicitude->edadUser }}</td>
                                <td>{{ $solicitude->ciudadUser }}</td>
                                <td>{{ $solicitude->coloniaUser }}</td>
                                <td>{{ $solicitude->telefonoUser }}</td>
                                <td>{{ $solicitude->correoUser }}</td>
                                <td>
                                    <a class="btn btn-woox text-light" href="/solicitude/{{ $solicitude->id }}/edit">Editar</a>
                                </td>
                                <td>
                                    <form action="/solicitude/{{ $solicitude->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="Eliminar">
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