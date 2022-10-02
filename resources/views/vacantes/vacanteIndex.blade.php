<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacante Index</title>
</head>
<body>
    <h1>Listado de Vacantes</h1>

    <a href="/vacante/create">Crear nueva vacante</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Sueldo</th>
            <th>Dirección</th>
            <th>Horario</th>
            <th>Puestos disponibles</th>
        </tr>
        @foreach ($vacantes as $vacante)
            <tr>
                <td>
                    <a href="/vacante/{{ $vacante->id }}">
                        {{ $vacante->nombreVacante }}
                    </a>
                </td>
                <td>{{ $vacante->descripcionVacante }}</td>
                <td>{{ $vacante->sueldoVacante }}</td>
                <td>{{ $vacante->direccionVacante }}</td>
                <td>{{ $vacante->horarioVacante }}</td>
                <td>{{ $vacante->puestosDisponibles }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>