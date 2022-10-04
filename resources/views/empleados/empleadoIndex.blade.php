<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Empleados</title>
</head>
<body>
    <h1>Index Empleados</h1>
    <a href="/empleado/create">Enlace a Create</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>NSS</th>
            <th>Puesto</th>
            <th>Sueldo</th>
            <th>RFC</th>
            <th>Fecha Nacimiento</th>
            <th>CURP</th>
            <th>Antiguedad</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($empleados as $empleado)
        <tr>
            <td>
                <a href="/empleado/{{ $empleado->id }}">
                    {{ $empleado->nombreEmpleado }}
                </a>
            </td>
            <td>{{ $empleado->apellidoEmpleado }}</td>
            <td>{{ $empleado->numeroSeguroSocialEmpleado }}</td>
            <td>{{ $empleado->puestoLaboralEmpleado }}</td>
            <td>{{ $empleado->sueldoEmpleado }}</td>
            <td>{{ $empleado->rfcEmpleado }}</td>
            <td>{{ $empleado->fechaNacimientoEmpleado }}</td>
            <td>{{ $empleado->curpEmpleado }}</td>
            <td>{{ $empleado->antiguedadEmpleado }}</td>
            <!-- Encabezado Editar -->
            <td>
                <a href="/empleado/{{ $empleado->id }}/edit">Editar</a>
            </td>
            <!-- Encabezado Eliminar -->
            <td>
                <form action="/empleado/{{ $empleado->id }}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
</body>
</html>